<?php

namespace App\Controllers;

use CodeIgniter\Config\Config;
use Config\Database;

class CpanelSuper extends BaseController
{
    protected $modulPelapor;
    protected $modulLaporan;
    protected $modulAdmin;
    protected $modulDivisi;
    public function __construct()
    {
        // Menggunakan model ModelBioPelapor.php dan ModelLaporan.php
        $this->modulAdmin = new \App\Models\ModelUserCpanel();
        $this->modulPelapor = new \App\Models\ModelBioPelapor();
        $this->modulLaporan = new \App\Models\ModelLaporan();
        $this->modulDivisi = new \App\Models\ModelDivisi();
    }
    public function index()
    {
        session()->destroy('user_id');
        return view('cpanel_spuser/login');
    }
    public function login()
    {
        session()->destroy('user_id');
        return view('cpanel_spuser/login');
    }
    public function divisi()
    {
        $tabel = $this->modulDivisi->findAll();

        $data = [
            'judul' => 'Manajemen Divisi',
            'tabel'  => $tabel
        ];
        return view('cpanel_spuser/lap_divisi', $data);
    }
    public function buatDivisi()
    {
        $kd = $this->request->getVar('kd_div');
        $nm = $this->request->getVar('nama_div');

        $tambahan = $this->modulDivisi->where('kd_divisi', $kd)->findAll();
        $cek = count($tambahan);

        if ($cek == 1) {
            session()->setFlashdata('error', 'Error, Kode Divisi sudah terdaftar');
            return redirect()->to('/cpanelsuper/divisi');
        } else {

            $this->modulDivisi->save([
                'kd_divisi'       => $kd,
                'nama_divisi'     => $nm
            ]);

            session()->setFlashdata('pesan', 'Selamat, Divisi Sudah tersimpan');
            return redirect()->to('/cpanelsuper/divisi');
        }
    }
    public function hapusDivisi()
    {
        $kode = $this->request->getVar('id');
        $this->modulDivisi->delete($kode);
        session()->setFlashdata('pesan', 'Divisi berhasil dihapus!');
        return redirect()->to('/cpanelsuper/divisi');
    }
    public function list_user_cpanel()
    {
        $nene = session()->get('user_id');
        if ($nene == NULL) {
            // Menambah data sesi sementara bernama error
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to('/cpanel/index');
        } else {
            $user = $this->modulAdmin->findAll();
            $data = [
                'nama' => 'List User Cpanel',
                'datauser' => $user
            ];

            return view('/cpanel_spuser/lap_user_cpanel', $data);
        }
    }
    public function masuk()
    {

        $user = $this->request->getVar('user');
        $pass = $this->request->getVar('pass');

        $login = $this->modulAdmin->where(['username' => $user, 'password' => $pass])->findAll();
        $cek = count($login);

        if ($cek == 0) {
            session()->setFlashdata('error', 'Username atau password salah!');

            return redirect()->to('cpanelsuper/index');
        } else if ($cek > 1) {
            session()->setFlashdata('error', 'Website Error!');

            return redirect()->to('cpanelsuper/index');
        } else {
            session()->set([
                'user_id' => $user,
                'level' => $login[0]['level'],
                'divisi'    => $login[0]['kd_divisi']
            ]);

            return redirect()->to('cpanelsuper/dashboard');
        }
    }
    public function dashboard()
    {
        $nene = session()->get('user_id');
        $level = session()->get('level');
        $divisi = session()->get('divisi');
        if ($nene == NULL) {
            // Menambah data sesi sementara bernama error
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to('/cpanel/index');
        } else {
            $ambilnama = $this->modulAdmin->where(['username' => $nene])->findColumn('nama');
            $nama = [
                'nama'  => $ambilnama[0],
                'id'    => $nene,
                'level' => $level,
                'division' => $divisi
            ];

            return view('cpanel_spuser/dashboard', $nama);
        }
    }
    public function laporan_masuk()
    {
        $level = session()->get('level');
        $divisi = session()->get('divisi');
        $db = \Config\Database::connect();
        if ($level == 0) {
            $builder = $db->query("SELECT laporan.tgl_lap_masuk, laporan.kode_laporan, laporan.kode_identitas, laporan.judul_laporan, laporan.desc_laporan, bio_pelapor.kode_identitas, bio_pelapor.nama, divisi.nama_divisi, divisi.kd_divisi FROM laporan LEFT JOIN bio_pelapor ON laporan.kode_identitas = bio_pelapor.kode_identitas LEFT JOIN divisi ON laporan.kd_divisi = divisi.kd_divisi WHERE laporan.status = 0");
            $divisi = $this->modulDivisi->findAll();
            $laporan = $builder->getResult('array');

            $data = [
                'judul' => 'Laporan Masuk',
                'lpm'   => $laporan,
                'divs'  => $divisi
            ];
        } else {
            $builder = $db->query("SELECT laporan.tgl_lap_masuk, laporan.kode_laporan, laporan.kode_identitas, laporan.judul_laporan, laporan.desc_laporan, bio_pelapor.kode_identitas, bio_pelapor.nama, divisi.nama_divisi, divisi.kd_divisi FROM laporan LEFT JOIN bio_pelapor ON laporan.kode_identitas = bio_pelapor.kode_identitas LEFT JOIN divisi ON laporan.kd_divisi = divisi.kd_divisi WHERE laporan.status = 0 AND laporan.kd_divisi = '$divisi'");
            $divisi = $this->modulDivisi->findAll();
            $laporan = $builder->getResult('array');

            $data = [
                'judul' => 'Laporan Masuk',
                'lpm'   => $laporan,
                'divs'  => $divisi
            ];
        }

        return view('cpanel_spuser/lap_masuk', $data);
    }
    public function laporan_masuk_teruskan()
    {
        $perubahan = $this->request->getVar('divisi');
        $nolap = $this->request->getVar('lap_id');
        $reject = $this->request->getVar('reject');
        $admin = session()->get('user_id');
        if ($reject == NULL) {
            $filter = $this->modulLaporan->where('kode_laporan', $nolap)->findColumn('kd_divisi');
            $filter_str = implode("|", $filter);
            if ($filter_str == $perubahan) {
                $this->modulLaporan->update($nolap, ['status' => 1, 'kd_user_ver' => $admin]);
                session()->setFlashdata('pesan', 'Data berhasil diteruskan ke Kepala Bagian');
                return redirect()->to('/cpanelsuper/laporan_masuk');
            } else if ($filter_str != $perubahan) {
                $this->modulLaporan->update($nolap, ['kd_divisi' => $perubahan, 'status' => 1, 'kd_user_ver' => $admin]);
                session()->setFlashdata('pesan', 'Data berhasil berubah dan diteruskan ke Kepala Bagian');
                return redirect()->to('/cpanelsuper/laporan_masuk');
            } else {
                echo "Error";
            }
        } else {
            $this->modulLaporan->update($nolap, ['status' => 3, 'tanggapan' => $reject, 'kd_user_ver' => $admin]);
            session()->setFlashdata('pesan', 'Laporan sudah disimpan');
            return redirect()->to('/cpanelsuper/laporan_masuk');
        }
    }
    public function laporan_konfirm()
    {
        $level = session()->get('level');
        $divisi = session()->get('divisi');
        $db = \Config\Database::connect();

        if ($level == 0) {
            $kode = $db->query("SELECT laporan.kode_laporan, laporan.tgl_lap_masuk, laporan.judul_laporan, laporan.desc_laporan, bio_pelapor.nama, divisi.nama_divisi FROM laporan LEFT JOIN bio_pelapor ON laporan.kode_identitas = bio_pelapor.kode_identitas LEFT JOIN divisi ON laporan.kd_divisi = divisi.kd_divisi WHERE laporan.status = 1");
            $listlap = $kode->getResult('array');

            $data = [
                'judul' => 'Laporan Masuk',
                'lpm'   => $listlap
            ];
        } else {
            $kode = $db->query("SELECT laporan.kode_laporan, laporan.tgl_lap_masuk, laporan.judul_laporan, laporan.desc_laporan, bio_pelapor.nama, divisi.nama_divisi FROM laporan LEFT JOIN bio_pelapor ON laporan.kode_identitas = bio_pelapor.kode_identitas LEFT JOIN divisi ON laporan.kd_divisi = divisi.kd_divisi WHERE laporan.status = 1 AND laporan.kd_divisi = '$divisi'");
            $listlap = $kode->getResult('array');

            $data = [
                'judul' => 'Laporan Masuk',
                'lpm'   => $listlap
            ];
        }

        return view('cpanel_spuser/lap_konfirm', $data);
    }
    public function laporan_konfirm_acc()
    {
        $kd_lap = $this->request->getVar('kdlap');
        $tombol = $this->request->getVar('konfirm');
        $admin = session()->get('user_id');
        if ($tombol == "Terima") {
            $this->modulLaporan->update($kd_lap, ['status' => 2, 'kd_approve' => $admin]);
            session()->setFlashdata('pesan', 'Data berhasil disimpan!');
            return redirect()->to('/cpanelsuper/laporan_konfirm');
        } else if ($tombol == "Tolak") {
            $this->modulLaporan->update($kd_lap, ['status' => 3, 'kd_approve' => $admin]);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/cpanelsuper/laporan_konfirm');
        } else {
            echo "Yabe";
        }
    }
    public function laporan_acc()
    {
        $level = session()->get('level');
        $divisi = session()->get('divisi');

        $db = \Config\Database::connect();
        if ($level == 0) {
            $kode = $db->query("SELECT laporan.tgl_lap_masuk, laporan.judul_laporan, laporan.status, bio_pelapor.nama, divisi.nama_divisi FROM laporan LEFT JOIN bio_pelapor ON laporan.kode_identitas = bio_pelapor.kode_identitas LEFT JOIN divisi ON laporan.kd_divisi = divisi.kd_divisi WHERE laporan.status = 2");
            $laporan = $kode->getResult('array');
            $data = [
                'judul' => 'Laporan Diterima Kabag',
                'lpm'   => $laporan,
            ];
        } else {
            $kode = $db->query("SELECT laporan.tgl_lap_masuk, laporan.judul_laporan, laporan.status, bio_pelapor.nama, divisi.nama_divisi FROM laporan LEFT JOIN bio_pelapor ON laporan.kode_identitas = bio_pelapor.kode_identitas LEFT JOIN divisi ON laporan.kd_divisi = divisi.kd_divisi WHERE laporan.kd_divisi = '$divisi' AND laporan.status BETWEEN 2 AND 3");
            $laporan = $kode->getResult('array');
            $data = [
                'judul' => 'Laporan yang sudah dikonfirmasi',
                'lpm'   => $laporan,
            ];
        }

        return view('cpanel_spuser/lap_acc', $data);
    }
    public function list_user()
    {
        $list = @$this->modulPelapor->findAll();

        $data = [
            'judul' => 'List Pelapor',
            'pendaftar' => $list
        ];

        return view('cpanel_spuser/lap_user', $data);
    }
    public function list_lap_ditolak()
    {
        $db = \Config\Database::connect();
        $kode = $db->query("SELECT laporan.judul_laporan, bio_pelapor.nama, divisi.nama_divisi FROM laporan LEFT JOIN bio_pelapor ON laporan.kode_identitas = bio_pelapor.kode_identitas LEFT JOIN divisi ON laporan.kd_divisi = divisi.kd_divisi WHERE laporan.status = 3");
        $listlap = $kode->getResult('array');

        $data = [
            'judul' => 'List Laporan yang ditolak',
            'lslap' => $listlap
        ];
        return view('cpanel_spuser/lap_ditolak', $data);
    }
}
