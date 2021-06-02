<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class App extends BaseController
{
	public function index(){
		return redirect()->to('/app/home');
	}

	public function home(){
		return view('app', ['page' => 'home']);
	}

	public function account(){
		return view('app', ['page' => 'account']);
	}

	public function product($productid = FALSE){
		return view('app', ['page' => 'product', 'productid' => $productid]);
	}

	public function notfound(){
		return view('notfound');
	}
}
