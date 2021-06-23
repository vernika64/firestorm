<?php

namespace App\Controllers;

class Cpanel extends BaseController
{
    protected $modulLaporan;
    protected $modulPelapor;

    public function __construct()
    {
        $this->modulLaporan = new \App\Models\InputLaporan();
        $this->modulPelapor = new \App\Models\ModelPendaftaran();
    }
    public function masuk()
    {
        $user = $this->request->getVar('nik');
        $pass = $this->request->getVar('pass');

        $pintu = $this->modulPelapor->where(['kode_identitas' => $user, 'password' => $pass])->findAll();
        $list  = count($pintu);
        if ($list == 0) {
            session()->setFlashdata('error', 'NIK tidak terdaftar!');
            return redirect()->to('cpanel/index');
        } else if ($list > 1) {
            session()->setFlashdata('error', 'Website Error!');
            return redirect()->to('cpanel/index');
        } else {
            session()->set([
                'user_id' => $user,
            ]);
            return redirect()->to('/cpanel/dashboard');
        }
    }
    public function index()
    {
        session()->destroy('user_id');
        return view('Login');
    }
    public function dashboard()
    {
        $nana = session()->get('user_id');
        if ($nana == NULL) {
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to('/cpanel/index');
        } else {

            $user = session()->get('user_id');
            $filter = $this->modulPelapor->where(['kode_identitas' => $user])->findColumn('nama');
            $filterstr = implode("|", $filter);
            $nama = [
                'nama' => $filterstr,
                'id'   => $user
            ];

            return view('cpanel_item/cp_beranda', $nama);
        }
    }
    public function buatlaporan()
    {
        return view('cpanel_item/cp_bu_laporan');
    }
    public function statuslaporan()
    {
        return view('cpanel_item/cp_statuslap');
    }
    public function prosesBuatLaporan()
    {
        // $this->modulLaporan->save([
        //     'tanggal_masuk' => $this->request->getVar('jdl_laporan'),
        //     'desc_laporan'  => $this->request->getVar('d_laporan'),
        //     'map_file'      => $this->request->getVar('lok_file'),
        //     'status'        => "1",
        // ]);
    }
}
