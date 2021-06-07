<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanandetail extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_pesanan'       => [
				'type'       => 'INT',
				'constraint'     => 5,
			],
			'id_produk' => [
				'type' => 'INT',
				'constraint'     => 5,
			],
			'harga_jual' => [
				'type' => 'INT',
				'constraint'     => 5,
			],
			'qty' => [
				'type' => 'INT',
				'constraint'     => 5,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('Pesanan_Detail');
	}

	public function down()
	{
		$this->forge->dropTable('Pesanan_Detail');
	}
}
