<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesananheader extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pesanan'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_pemesan'       => [
				'type'       => 'INT',
				'constraint' => 5,
			],
			'tgl_pesan' => [
				'type' => 'DATE',
			],
			'status_pesanan' => [
				'type' => 'CHAR',
				'constraint' => 10,
			],
			'bukti_pembayaran' => [
				'type' => 'CHAR',
				'constraint' => 255,
			]
		]);
		$this->forge->addKey('id_pesanan', true);
		$this->forge->createTable('Pesanan_Header');
	}

	public function down()
	{
		$this->forge->dropTable('Pesanan_Header');
	}
}
