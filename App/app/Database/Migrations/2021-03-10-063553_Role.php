<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
	public function up()
	{
		//Tambahkan field role [id, nip, role]
		$this->forge->addField([
			'Id'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'NIP'          => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'Role'      => [
				'type'           => 'ENUM',
				'constraint'     => ['dosen', 'konselor', 'sekprodi', 'admin'],
				'default'        => 'dosen',
			],
		]);

		// Membuat primary key
		$this->forge->addKey('Id', TRUE);

		// gives CONSTRAINT
		$this->forge->addForeignKey('NIP','dosen','NIP','CASCADE','CASCADE');

		// Membuat tabel role
		$this->forge->createTable('role', TRUE);

	}

	public function down()
	{
		// DROP if exists
	}
}
