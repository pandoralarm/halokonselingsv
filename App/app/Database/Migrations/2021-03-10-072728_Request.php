<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Request extends Migration
{
	public function up()
	{
		//Tambah field ke tabel rquest
		$this->forge->addField([
			'RequestID'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'MahasiswaNIM'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'MahasiswaNama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'RequestDetail'      => [
				'type'           => 'TEXT',
			],
			'ThreadKey'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'Timestamp' => [
				'type'           => 'DATETIME',
			],
		]);

		// Membuat primary key
		$this->forge->addKey('RequestID', TRUE);
		
		// Membuat tabel role
		$this->forge->createTable('Request', TRUE);

	}

	public function down()
	{
		// DROP if exists
		$this->forge->dropTable('Request');
	}
}
