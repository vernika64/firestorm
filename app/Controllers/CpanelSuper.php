<?php

namespace App\Controllers;

class CpanelSuper extends BaseController
{
    protected $modulPelapor;
    protected $modulLaporan;
    protected $modulAdmin;
    public function __construct()
    {
        // Menggunakan model ModelBioPelapor.php dan ModelLaporan.php
        $this->modulAdmin = new \App\Models\ModelUserCpanel();
        $this->modulPelapor = new \App\Models\ModelBioPelapor();
        $this->modulLaporan = new \App\Models\ModelLaporan();
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
        $laporan = $this->modulLaporan->findAll();
        $data = [
            'judul' => 'Laporan Masuk',
            'lpm'   => $laporan
        ];

        return view('cpanel_spuser/lap_masuk', $data);
    }
    public function laporan_konfirm()
    {
        return view('cpanel_spuser/lap_konfirm');
    }
    public function laporan_acc()
    {
        return view('cpanel_spuser/lap_acc');
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
