<?php

namespace App\Controllers;



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
                'user_id' => $user
            ]);

            return redirect()->to('cpanelsuper/dashboard');
        }
    }
    public function dashboard()
    {
        $nene = session()->get('user_id');
        if ($nene == NULL) {
            // Menambah data sesi sementara bernama error
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to('/cpanel/index');
        } else {
            $ambilnama = $this->modulAdmin->where(['username' => $nene])->findColumn('nama');
            $jdnama = implode("|", $ambilnama);
            $nama = [
                'nama'  => $jdnama,
                'id'    => $nene
            ];

            return view('cpanel_spuser/dashboard', $nama);
        }
    }
    public function laporan_masuk()
    {

        $laporan = $this->modulLaporan->join('bio_pelapor', 'bio_pelapor.kode_identitas = laporan.kode_identitas')->where('laporan.status', 0)->findAll();
        $data = [
            'judul' => 'Laporan Masuk',
            'lpm'   => $laporan
        ];

        return view('cpanel_spuser/lap_masuk', $data);
    }
    public function laporan_konfirm()
    {
        $laporan = $this->modulLaporan->join('bio_pelapor', 'bio_pelapor.kode_identitas = laporan.kode_identitas')->where('laporan.status', 1)->findAll();
        $data = [
            'judul' => 'Laporan Butuh Acc',
            'lpm'   => $laporan
        ];

        return view('cpanel_spuser/lap_konfirm', $data);
    }
    public function laporan_acc()
    {

        $laporan = $this->modulLaporan->join('bio_pelapor', 'bio_pelapor.kode_identitas = laporan.kode_identitas')->where('laporan.status', 2)->findAll();
        $data = [
            'judul' => 'Laporan Sudah di Acc',
            'lpm'   => $laporan
        ];

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
}
