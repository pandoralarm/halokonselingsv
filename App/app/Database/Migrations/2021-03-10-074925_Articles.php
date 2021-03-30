<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Articles extends Migration
{
	public function up()
	{
		//Tambah field ke tabel Articles
		$this->forge->addField([
			'ArticleID'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'Title'       => [
				'type'           => 'TEXT',
			],
			'Header'      => [
				'type'           => 'TEXT',
			],
			'Content'      => [
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
		$this->forge->addKey('ArticleID', TRUE);

		// gives CONSTRAINT
		$this->forge->addForeignKey('KonselorNIP','dosen','NIP','CASCADE','CASCADE');

		// Membuat tabel role
		$this->forge->createTable('articles', TRUE);

	}

	public function down()
	{
		// DROP if exists
		
	}
}
