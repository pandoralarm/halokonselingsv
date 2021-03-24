<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Chats extends Migration
{
	public function up()
	{
		//Tambah field ke tabel chats
		$this->forge->addField([
			'ThreadID'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'ThreadKey'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'MahasiswaNIM'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'KonselorNIP'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'ThreadStatus'      => [
				'type'           => 'ENUM',
				'constraint'     => ['OPEN', 'CLOSED'],
				'default'        => 'OPEN',
			],
			'Started_at'          => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'Closed_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
		]);

		// Membuat primary key
		$this->forge->addKey('ThreadID', TRUE);

		// gives CONSTRAINT
		$this->forge->addForeignKey('KonselorNIP','Dosen','NIP','CASCADE','CASCADE');

		// Membuat tabel role
		$this->forge->createTable('Chats', TRUE);

	}

	public function down()
	{
		//
	}
}
