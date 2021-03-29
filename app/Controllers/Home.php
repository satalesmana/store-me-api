<?php

namespace App\Controllers;

use App\Models\Produk;

class Home extends BaseController
{
	public function index()
	{
		
		$data['page'] = 'pages/home_view';
		return view("main",$data);
	}


}
