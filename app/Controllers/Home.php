<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;

class Home extends BaseController
{
	protected $modelPelapor;

	public function __construct()
	{
		// Menggunakan model ModelLaporan.php
		$this->modelPelapor = new \App\Models\ModelBioPelapor();
	}
	public function index()
	{
		return view('front/halamandepan');
	}
	public function daftar()
	{
		$nik = $this->request->getPost('ktp');
		$query = $this->modelPelapor->asArray()->where(['kode_identitas' => $nik])->findAll();
		$kolom = count($query);

		if ($kolom == 0) {

			$this->modelPelapor->save([
				'kode_identitas'	=>	$nik,
				'nama'	=>	$this->request->getPost('nama'),
				'status'	=>	$this->request->getPost('pekerjaan'),
				'tgl_lahir'	=>	$this->request->getPost('tgl_lhr'),
				'kota_asal'	=>	$this->request->getPost('kota'),
				'no_hp'	=>	$this->request->getPost('ponsel'),
				'email'	=>	$this->request->getPost('email'),
				'password' => $this->request->getPost('pw_baru')
			]);

			session()->setFlashdata('pesan', 'Selamat, anda sudah terdaftar! Silahkan login dengan akun yang sudah anda daftarkan!');
			return  redirect()->to('/cpanel/index');
		} else if ($kolom >= 1) {
			session()->setFlashdata('error', 'Kode Identitas Sudah Terdaftar');
			return redirect()->to('cpanel/index');
		}
	}
}
