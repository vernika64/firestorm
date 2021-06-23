<?php

namespace App\Controllers;

class CpanelSuper extends BaseController
{
    protected $modelPelapor;
    protected $modelLaporan;
    public function __construct()
    {
        // Menggunakan model ModelBioPelapor.php dan ModelLaporan.php
        $this->modelPelapor = new \App\Models\ModelBioPelapor();
        $this->modelLaporan = new \App\Models\ModelLaporan();
    }
    public function dashboard()
    {
        return view('cpanel_spuser/dashboard');
    }
    public function laporan_masuk()
    {
        $laporan = $this->modelLaporan->findAll();
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
        $list = @$this->modelPelapor->findAll();

        $data = [
            'judul' => 'List Pelapor',
            'pendaftar' => $list
        ];

        return view('cpanel_spuser/lap_user', $data);
    }
}
