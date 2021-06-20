<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'					=> [
				'type'				=> 'INT',
				'constraint'		=> 4,
				'unsigned'			=> TRUE,
				'auto_increment'	=> TRUE
			],
			'username'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 10,
			],
			'password'				=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 10,
			],
			'nama'					=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50
			],
			'divisi'				=> [
				'type'				=> 'INT',
				'constraint'		=> 5,
			],
			'level'					=> [
				'type'				=> 'CHAR',
				'constraint'		=> 10,
			],
			'create_at'				=> [
				'type'				=> 'DATETIME',
				'null'				=> TRUE
			]
			]);
	}

	public function down()
	{
		//
	}
}
