<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CpanelUser extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'					=> [
				'type'				=> 'INT',
				'constraint'		=> 20,
				'auto_increment'	=> TRUE,
				'unsigned'			=> TRUE
			],
			'username'			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 20
			],
			'password'			=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'nama'					=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 255
			],
			'kd_divisi'			=> [
				'type'			=> 'CHAR',
				'constraint'	=> 10
			],
			'level'			=> [
				'type'			=> 'INT',
				'constraint'	=> 5
			],
			'tanggal_reg'		=> [
				'type'			=> 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('username');
		$this->forge->createTable('cpanel_user');
	}
	public function down()
	{
		//
	}
}
