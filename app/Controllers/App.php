<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class App extends BaseController
{
	public function serve($page = FALSE, $param = FALSE){
		if(! $page) return redirect()->to('/app/home');
		else return view('app', ['page' => $page, 'param' => $param]);
	}
}
