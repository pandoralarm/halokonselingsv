<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Messages extends Migration
{
	public function up()
	{
		//Tambah field ke tabel Messages
		$this->forge->addField([
			'MessageID'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'SenderID'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'MessageType'      => [
				'type'           => 'ENUM',
				'constraint'     => ['text', 'image', 'audio'],
				'default'        => 'text',
			],
			'Message'      => [
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
		$this->forge->addKey('MessageID', TRUE);

		// Membuat tabel role
		$this->forge->createTable('messages', TRUE);

	}

	public function down()
	{
		// DROP if exists
		
	}
}
