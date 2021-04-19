<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createmember extends Migration
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
			'nama_member'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => false,
			],
			'foto' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'alamat' => [
				'type' => 'TEXT',
				'null' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('members');
	}

	public function down()
	{
		$this->forge->dropTable('members');
	}
}
