<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanVerifOk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'				=> [
				'type'			=> 'INT',
				'constraint'	=> 20
			],
			'kode_laporan' => [
				'type'			=> 'INT',
				'constraint'	=> 20
			],
			'user_id' => [
				'type'			=> 'INT',
				'constraint'	=> 20
			],
			'approve' => [
				'type'			=> 'INT',
				'constraint'	=> 1
			],
			'feedback' => [
				'type'			=> 'TEXT'
			],
			'tgl_approve' => [
				'type'			=> 'DATETIME'
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('lap_verif_ok');
	}

	public function down()
	{
		//
	}
}
