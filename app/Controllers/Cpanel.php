<?php

namespace App\Controllers;

class Cpanel extends BaseController
{
    // Mendeklarasi class agar bisa digunakan di setiap function di file ini
    protected $modulLaporan;
    protected $modulPelapor;
    protected $modulDivisi;

    public function __construct()
    {
        // Menggunakan model ModelBioPelapor.php dan ModelLaporan.php
        $this->modulLaporan = new \App\Models\ModelLaporan();
        $this->modulPelapor = new \App\Models\ModelBioPelapor();
        $this->modulDivisi = new \App\Models\ModelDivisi();
    }
    public function masuk()
    {
        // Mengambil data dari form menggunakan metode POST
        $user = $this->request->getVar('nik');
        $pass = $this->request->getVar('pass');

        // Query untuk login
        $pintu = $this->modulPelapor->where(['kode_identitas' => $user, 'password' => $pass])->findAll();

        // Menghitung jumlah hasil Query
        $list  = count($pintu);

        // Jika data kosong
        if ($list == 0) {
            // Menambah sebuah sesi sementara bernama error
            session()->setFlashdata('error', 'NIK belum terdaftar!');
            return redirect()->to('cpanel/index');
        }
        // Jika data lebih dari 1
        else if ($list > 1) {
            // Menambah sebuah sesi sementara bernama error
            session()->setFlashdata('error', 'Website Error!');

            // Menampilkan layout website
            return redirect()->to('cpanel/index');
        }
        // Proses akhir keputusan
        else {
            session()->set([
                'user_id' => $user,
            ]);

            // Menampilkan layout website
            return redirect()->to('/cpanel/dashboard');
        }
    }
    public function index()
    {
        // Menghapus sesi bernama user_id
        session()->destroy('user_id');

        // Menampilkan layout website
        return view('Login');
    }
    public function dashboard()
    {
        // Mengambil data dari session yang bernama user id
        $nana = session()->get('user_id');

        // Jika class nana tidak ada datanya
        if ($nana == NULL) {
            // Menambah data sesi sementara bernama error
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to('/cpanel/index');
        }

        // Mengambil data dari sesion yang bernama user_id
        $user = session()->get('user_id');

        // Query untuk menampilkan data dari database
        $filter = $this->modulPelapor->where(['kode_identitas' => $user])->findColumn('nama');
        $filterstr = implode("|", $filter);
        $nama = [
            'nama' => $filterstr,
            'id'   => $user
        ];

        // Menampilkan layout website
        return view('cpanel_item/cp_beranda', $nama);
    }
    public function buatlaporan()
    {
        $isiDiv = $this->modulDivisi->findAll();
        $data = ['divisi' => $isiDiv];

        // Menampilkan layout website
        return view('cpanel_item/cp_bu_laporan', $data);
    }
    public function statuslaporan()
    {
        // Mengambil data dari session yang bernama user id
        $nana = session()->get('user_id');

        // Jika class nana tidak ada datanya
        if ($nana == NULL) {
            // Menambah data sesi sementara bernama error
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to('/cpanel/index');
        }

        $listlaporan = $this->modulLaporan->findAll();
        $kirim = ['laporan' => $listlaporan];

        // Menampilkan layout website
        return view('cpanel_item/cp_statuslap', $kirim);
    }
    public function prosesBuatLaporan()
    {
        // Mengambil data dari session yang bernama user id
        $nana = session()->get('user_id');

        // Jika class nana tidak ada datanya
        if ($nana == NULL) {
            // Menambah data sesi sementara bernama error
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to('/cpanel/index');
        }

        $files = $this->request->getPost('inifile');

        if ($files == NULL) {
            $this->modulLaporan->save([
                'kode_identitas'           => $nana,
                'judul_laporan'            => $this->request->getVar('title'),
                'desc_laporan'             => $this->request->getVar('desc'),
                'kd_divisi'                => $this->request->getVar('kd_dvs'),
                'map_file'                 => NULL,
                'status'                   => '0'
            ]);

            session()->setFlashdata('pesan', 'Selamat, Laporan sudah terdaftar ! Mohon tunggu untuk validasi dari tim kami');
            return redirect()->to('/cpanel/dashboard');
        } else {
            $file = $this->request->getFile('inifile');

            $namaFile = $file->getRandomName();

            $file->move('laporan', $namaFile);

            $this->modulLaporan->save([
                'kode_identitas'           => $nana,
                'judul_laporan'            => $this->request->getVar('title'),
                'desc_laporan'             => $this->request->getVar('desc'),
                'kode_divisi'              => $this->request->getVar('kd_dvs'),
                'map_file'                 => $namaFile,
                'status'                   => '0'
            ]);

            session()->setFlashdata('pesan', 'Selamat, Laporan sudah terdaftar ! Mohon tunggu untuk validasi dari tim kami');
            return redirect()->to('/cpanel/dashboard');
        }
    }
}
