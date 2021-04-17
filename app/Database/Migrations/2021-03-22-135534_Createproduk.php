<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createproduk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_produk'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'kategori_id' => [
				'type' => 'INT',
				'constraint' => 5,
			],
			'keterangan' => [
				'type' => 'TEXT',
				'null' => true,
			],
		]);
		$this->forge->addKey('produk_id', true);
		$this->forge->createTable('produk');
	}

	public function down()
	{
		$this->forge->dropTable('produk');
	}
}
