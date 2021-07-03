<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Divisi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kd_divisi'			=> [
				'type'			=> 'CHAR',
				'constraint'	=> 5
			],
			'nama_divisi'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 50
			],
			'tgl_dibuat'		=> [
				'type'			=> 'DATETIME',
			]
		]);
		$this->forge->addKey('kd_divisi', true);
		$this->forge->createTable('divisi');
	}

	public function down()
	{
	}
}
