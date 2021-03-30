<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
	public function up()
	{
		//Tambahkan field dosen [nip, nama, prodi, pns, username]
		$this->forge->addField([
			'NIP'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'Nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'Prodi'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'Pns' => [
				'type'           => 'BOOL',
			],
		]);

		
		// Membuat primary key
		$this->forge->addKey('NIP', TRUE);

		
		// Membuat tabel dosen
		$this->forge->createTable('dosen', TRUE);

	}

	public function down()
	{
		// DROP if exists
	}
}
