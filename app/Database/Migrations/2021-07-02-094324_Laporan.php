<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laporan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kode_laporan'			=> [
				'type'				=> 'INT',
				'constraint'		=> 20
			],
			'kode_identitas' 			=> [
				'type'				=> 'INT',
				'constraint'		=> 20
			],
			'judul_laporan'
			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 255
			],
			'desc_laporan'
			=> [
				'type'				=> 'TEXT'
			],
			'kd_divisi'
			=> [
				'type'				=> 'CHAR',
				'constraint'		=> 5
			],
			'map_file'
			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 255
			],
			'status'
			=> [
				'type'				=> 'INT',
				'constraint'		=> 1
			],
			'tanggapan'
			=> [
				'type'				=> 'TEXT',
			],
			'tgl_lap_masuk'
			=> [
				'type'				=> 'DATETIME'
			],
			'tgl_lap_update'			=> [
				'type'				=> 'DATETIME'
			],
			'kd_user_ver'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 20
			],
			'kd_approve'			=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 20
			],
		]);
		$this->forge->addKey('kode_laporan', true);
		$this->forge->createTable('laporan');
	}

	public function down()
	{
		//
	}
}
