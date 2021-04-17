<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Beasiswa extends Migration
{
	public function up()
	{
		//Tambah field ke tabel chats
		$this->forge->addField([
			'idBeasiswa'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'namaBeasiswa'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'donatur'    => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'nominal'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'syaratSemester'      => [
				'type'           => 'INT',
			],
			'syaratIPK'      => [
				'type'           => 'FLOAT',
			],
			'tglDibuka'          => [
				'type'           => 'DATE',
			],
			'tglDitutup' => [
				'type'           => 'DATE',
			],
			'status' => [
				'type'           => 'BOOL',
			],
		]);

		// Membuat primary key
		$this->forge->addKey('idBeasiswa', TRUE);

		$this->forge->createTable('beasiswa', TRUE);
	}

	public function down()
	{
		//
	}
}
