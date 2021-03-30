<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Events extends Migration
{
	public function up()
	{
		//Tambah field ke tabel Events
		$this->forge->addField([
			'EventID'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'Title'       => [
				'type'           => 'TEXT',
			],
			'Location'      => [
				'type'           => 'TEXT',
			],
			'KonselorNIP'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'Timestamp' => [
				'type'           => 'DATETIME',
			],
		]);

		// Membuat primary key
		$this->forge->addKey('EventID', TRUE);

		// gives CONSTRAINT
		$this->forge->addForeignKey('KonselorNIP','Dosen','NIP','CASCADE','CASCADE');

		// Membuat tabel role
		$this->forge->createTable('events', TRUE);

	}

	public function down()
	{
		// DROP if exists
		
	}
}
