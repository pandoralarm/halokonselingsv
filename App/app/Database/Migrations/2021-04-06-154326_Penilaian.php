<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penilaian extends Migration
{
	public function up()
	{
		//Tambah field ke tabel chats
		$this->forge->addField([
			'idPenilaian'          => [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'idPengajuan'          => [
				'type'           => 'INT',
				'unique'         => true,
			],
			'kemampuanAkademik'    => [
				'type'           => 'INT',
			],
			'kemampuanLisan'       => [
				'type'           => 'INT',
			],
			'kemampuanTertulis'      => [
				'type'           => 'INT',
			],
			'motivasi'      => [
				'type'           => 'INT',
			],
			'kestabilan'      => [
				'type'           => 'INT',
			],
			'kreativitas'          => [
				'type'           => 'INT',
			],
			'kemampuanBerkelompok' => [
				'type'           => 'INT',
			],
			'kemampuanTeknis' => [
				'type'           => 'INT',
			],
		]);
		

		// Membuat primary key
		$this->forge->addKey('idPenilaian', TRUE);

		// gives CONSTRAINT
		$this->forge->addForeignKey('idPengajuan','pengajuan','idPengajuan','CASCADE','CASCADE');

		// Make Table
		$this->forge->createTable('penilaian', TRUE);
	}

	public function down()
	{
		//
	}
}
