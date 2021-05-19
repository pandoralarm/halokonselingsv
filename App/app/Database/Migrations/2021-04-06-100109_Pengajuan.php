<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengajuan extends Migration
{
	public function up()
	{
		//Tambah field ke tabel chats
		$this->forge->addField([
			'idPengajuan'         	=> [
				'type'           => 'INT',
				'auto_increment' => true,
			],
			'nama'   		       	=> [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'nim'        	  		=> [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'prodi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'semester'      	 => [
				'type'           => 'INT',
			],
			'ip1'      => [
				'type'           => 'FLOAT',
			],
			'ip2'      => [
				'type'           => 'FLOAT',
			],
			'ip3'      => [
				'type'           => 'FLOAT',
			],
			'ip4'      => [
				'type'           => 'FLOAT',
			],
			'ip5'      => [
				'type'           => 'FLOAT',
			],
			'ip6'      => [
				'type'           => 'FLOAT',
			],
			'ipk'      => [
				'type'           => 'FLOAT',
			],
			'namaBeasiswa'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'deadline'          => [
				'type'           => 'DATE',
			],
			'tanggalPengajuan' => [
				'type'           => 'DATE',
			],
			'status' => [
				'type'           => 'ENUM',
				'constraint'     => ['Diproses', 'Ditunda', 'Disetujui', 'Ditolak'],
				'default'        => 'Diproses',
			],
			'rekomendasi' => [
				'type'           => 'TEXT',
				'null' 			 => TRUE,
			],
			'cv' => [
				'type'           => 'TEXT',
				'null' 			 => TRUE,
			],
			'dosenPJ' => [
				'type'           => 'TEXT',
				'null' 			 => TRUE,
			],
			'nip' => [
				'type'           => 'VARCHAR',
				'null' 			 => TRUE,
				'constraint'     => 255,
			],
			'catatan' => [
				'type'           => 'TEXT',
				'null' 			 => TRUE,
			],
			'butuhFile' => [
				'type'           => 'INT',
				'null'			 => TRUE,
			],
		]);

		// Membuat primary key
		$this->forge->addKey('idPengajuan', TRUE);
		$this->forge->createTable('pengajuan', TRUE);
	}

	public function down()
	{
		//
	}
}
