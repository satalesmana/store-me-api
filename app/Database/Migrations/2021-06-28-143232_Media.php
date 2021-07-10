<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Media extends Migration
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
			'path' => [
				'type'			=> 'TEXT',
				'null'			=> false
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('media');
	}

	public function down()
	{
		$this->forge->dropTable('media');
	}
}
