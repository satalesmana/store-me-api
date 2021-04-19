<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addimageonkategori extends Migration
{
	public function up()
	{
		$fields = [
			'images' => [
				'type' => 'TEXT'
			]
		];
		$this->forge->addColumn('kategoris', $fields);
	}

	public function down()
	{
		$this->forge->dropTable('kategoris');
	}
}
