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
			'deskripsi' => [
				'type' => 'TEXT',
				'null' => true,
				// deskripsi
			],
			'harga_beli' => [
				'type' => 'INT',
				'null' => false,
				'constrait' => 12,
			],
			'harga_jual' => [
				'type' => 'INT',
				'null' => false,
				'constrait' => 12,
			],
			'stock' => [
				'type' => 'INT',
				'null' => true,
				'constrait' => 5,
			],
			'gambar' => [
				'type' => 'TEXT'
			],

		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('produk');
	}

	public function down()
	{
		$this->forge->dropTable('produk');
	}
}
