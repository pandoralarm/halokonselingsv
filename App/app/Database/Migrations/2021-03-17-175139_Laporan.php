<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laporan extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'LaporanID'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'ThreadKey'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'Masalah'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
		]);

		// Membuat primary key
		$this->forge->addKey('LaporanID', TRUE);

		// Membuat tabel role
		$this->forge->createTable('Laporan', TRUE);

	}

	public function down()
	{
		//
	}
}
