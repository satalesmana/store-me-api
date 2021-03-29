<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kontak extends BaseController
{
	public function index()
	{
		$data['page'] = 'pages/produk_view';
		return view("main",$data);
	}
}
