<?php

namespace App\Controllers;

class CpanelSuper extends BaseController
{
    protected $modelPendaftaran;
    protected $modelLaporanMasuk;
    public function __construct()
    {
        $this->modelPendaftaran = new \App\Models\ModelPendaftaran();
        $this->modelLaporanMasuk = new \App\Models\ModelLaporanMasuk();
    }
    public function dashboard()
    {
        return view('cpanel_spuser/dashboard');
    }
    public function laporan_masuk()
    {
        $laporan = $this->modelLaporanMasuk->findAll();
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
        $list = @$this->modelPendaftaran->findAll();

        $data = [
            'judul' => 'List Pelapor',
            'pendaftar' => $list
        ];

        return view('cpanel_spuser/lap_user', $data);
    }
}
