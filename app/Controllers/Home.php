<?php

namespace App\Controllers;

class Home extends BaseController
{
	protected $modelPendaftarans;
	public function __construct()
	{
		$this->modelPendaftarans = new \App\Models\ModelPendaftaran();
	}
	public function index()
	{
		return view('front/halamandepan');
	}
	public function daftar()
	{
		$this->modelPendaftarans->save([
			'kode_identitas'	=>	$this->request->getPost('ktp'),
			'nama'	=>	$this->request->getPost('nama'),
			'status'	=>	$this->request->getPost('pekerjaan'),
			'tgl_lahir'	=>	$this->request->getPost('tgl_lhr'),
			'kota_asal'	=>	$this->request->getPost('kota'),
			'no_hp'	=>	$this->request->getPost('ponsel'),
			'email'	=>	$this->request->getPost('email')
		]);

		// dd($this->request->getVar());
		session()->setFlashdata('pesan', 'Selamat, anda sudah terdaftar! Silahkan untuk login untuk melanjutkan');
		return  redirect()->to('/cpanel/index');
	}
	public function masuk()
	{
	}
}
