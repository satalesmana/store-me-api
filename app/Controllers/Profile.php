<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
	public function index()
	{
		$data['page'] = 'pages/profile_view';
		return view("main",$data);
	}
}
