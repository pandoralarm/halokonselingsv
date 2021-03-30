<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Logs extends Migration
{
	public function up()
	{
		//Tambah field ke tabel Logs
		$this->forge->addField([
			'LogID'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'ActorUsername'       => [
				'type'           => 'TEXT',
			],
			'Action'      => [
				'type'           => 'TEXT',
			],
			'Timestamp' => [
				'type'           => 'DATETIME',
			],
		]);

		// Membuat primary key
		$this->forge->addKey('LogID', TRUE);

		// Membuat tabel role
		$this->forge->createTable('logs', TRUE);

	}

	public function down()
	{
		// DROP if exists
		
	}
}
