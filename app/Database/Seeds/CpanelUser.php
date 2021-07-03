<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CpanelUser extends Seeder
{
	public function run()
	{
		$data = [
			[
				'username'		=>	'Admin',
				'password'		=>	'root',
				'nama'			=>	'Administrator',
				'kd_divisi'		=>	'TI',
				'level'			=>	'0'
			],
			[
				'username'		=>	'manajemen',
				'password'		=>	'super',
				'nama'			=>	'Unit Manajemen',
				'kd_divisi'		=>	'TI',
				'level'			=>	'3'
			],
			[
				'username'		=>	'upm',
				'password'		=>	'123',
				'nama'			=>	'Unit Pengaduan Masyarakat',
				'kd_divisi'		=>	'TI',
				'level'			=>	'2'
			],
			[
				'username'		=>	'kabag',
				'password'		=>	'root',
				'nama'			=>	'Kepala Bagian Teknik Informatika',
				'kd_divisi'		=>	'TI',
				'level'			=>	'1'
			]
		];
		$this->db->table('cpanel_user')->insertBatch($data);
	}
}
