<?php

namespace App\Database\Seeds;

use App\Models\Kategori;
use CodeIgniter\Database\Seeder;

class MemberSeeder extends Seeder
{
	public function run()
	{
		$kategori = new Kategori();


		$k= $kategori->first();
		echo $k['nama_kategori'];
	}
}
