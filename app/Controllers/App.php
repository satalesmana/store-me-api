<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class App extends BaseController
{
	public function index(){
		return view("app");
	}

	public function register(){
		return view("app", ['page' => 'register']);
	}

	public function account(){
		return view("app", ['page' => 'account']);
	}

	public function produk($produkid = FALSE){
		return view("app", ['page' => 'produk', 'produkid' => $produkid]);
	}

	public function notfound(){
		return view("notfound");
	}
}
