<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modifyproduktbl extends Migration
{
	public function up()
	{
		$fields = [
			'kategori' => [
					'name' => 'kategori_id',
					'type' => 'INT',
			],
		];
		$this->forge->modifyColumn('produk', $fields);
	}

	public function down()
	{
		$this->forge->dropTable('produk');
	}
}
