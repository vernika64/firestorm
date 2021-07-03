<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Divisi extends Seeder
{
	public function run()
	{
		$data = [
			[
				'kd_divisi'		=> 'TI',
				'nama_divisi'	=> 'Teknik Informatika'
			],
			[
				'kd_divisi'		=> 'AK',
				'nama_divisi'	=> 'Akuntansi'
			],
			[
				'kd_divisi'		=> 'EL',
				'nama_divisi'	=> 'Elektronika'
			],
			[
				'kd_divisi'		=> 'MB',
				'nama_divisi'	=> 'Manajemen Bisnis'
			],
			[
				'kd_divisi'		=> 'UPTPP',
				'nama_divisi'	=> 'UPT PP'
			],
			[
				'kd_divisi'		=> 'UPTSI',
				'nama_divisi'	=> 'UPT SI'
			],
		];

		$this->db->table('divisi')->insertBatch($data);
	}
}
