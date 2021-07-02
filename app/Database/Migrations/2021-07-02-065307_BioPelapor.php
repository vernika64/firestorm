<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BioPelapor extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kode_identitas'		=> [
				'type'				=> 'INT',
				'constraint'		=> 20
			],
			'nama'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 255
			],
			'status'				=> [
				'type'				=> 'INT',
				'constraint'		=> 1,
				'unsigned'			=> TRUE
			],
			'tgl_lahir'				=> [
				'type'				=> 'DATE',
			],
			'kota_asal'				=> [
				'type'				=> 'CHAR',
				'constraint'		=> '50'
			],
			'no_hp'					=> [
				'type'				=> 'INT',
				'constraint'		=> 20
			],
			'email'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 255
			],
			'password'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 255
			],
			'tgldaftar'			=> [
				'type'				=>	'DATETIME'
			],
			'tglperbarui'			=> [
				'type'				=> 'DATETIME'
			]
		]);
		$this->forge->addKey('kode_identitas', true);
		$this->forge->createTable('bio_pelapor');
	}

	public function down()
	{
		//
	}
}
