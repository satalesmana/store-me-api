<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Craetecategory extends Migration
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
			'nama_kategori'	=> [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'deskripsi'	=> [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('kategoris');
	}

	public function down()
	{
		$this->forge->dropTable('produk');
	}
}
