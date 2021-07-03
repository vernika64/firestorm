<?php

namespace App\Database\Seeds;

//use Codeigniter\I18n\Time;

class Biopelapor extends \CodeIgniter\Database\Seeder
{
	public function run()
	{
		$data = [
			[
				'kode_identitas'	=> '101',
				'nama'				=> 'Darth Vader',
				'status'			=> '0',
				'tgl_lahir'			=> '2002-01-04',
				'kota_asal'			=> 'Kuvukiland',
				'no_hp'				=> '081080121144',
				'email'				=> 'imnotyourson@wkwkland.com',
				'password'			=> '123'
				// 'tgldaftar'		=> Time::now(),
				// 'tglupdate'		=> Time::now()
			],
			[
				'kode_identitas'	=> '102',
				'nama'				=> 'Plumber Boy',
				'status'			=> '1',
				'tgl_lahir'			=> '1941-01-04',
				'kota_asal'			=> 'Isekai',
				'no_hp'				=> '081121041921',
				'email'				=> 'mushroomisgoodcivilization@naaaa.com',
				'password'			=> '123'
				// 'tgldaftar'		=> Time::now(),
				// 'tglupdate'		=> Time::now()
			],
			[
				'kode_identitas'	=> '103',
				'nama'				=> 'Bandicoot',
				'status'			=> '0',
				'tgl_lahir'			=> '2014-01-04',
				'kota_asal'			=> 'Wumpa',
				'no_hp'				=> '081911112002',
				'email'				=> 'wumpafruit@akuaku.com',
				'password'			=> '123'
				// 'tgldaftar'		=> Time::now(),
				// 'tglupdate'		=> Time::now()
			],
			[
				'kode_identitas'	=> '104',
				'nama'				=> 'Udin',
				'status'			=> '0',
				'tgl_lahir'			=> '2002-01-04',
				'kota_asal'			=> 'Tanah Abang',
				'no_hp'				=> '081911021004',
				'email'				=> 'udinperkasa@elite.com',
				'password'			=> '123'
				// 'tgldaftar'		=> Time::now(),
				// 'tglupdate'		=> Time::now()
			],
			[
				'kode_identitas'	=> '105',
				'nama'				=> 'Sven',
				'status'			=> '0',
				'tgl_lahir'			=> '2019-01-04',
				'kota_asal'			=> 'Broland',
				'no_hp'				=> '083091994812',
				'email'				=> 'sventhewolf@broland.com',
				'password'			=> '123'
				// 'tgldaftar'		=> Time::now(),
				// 'tglupdate'		=> Time::now()
			]
		];

		$this->db->table('bio_pelapor')->insertBatch($data);
	}
}
