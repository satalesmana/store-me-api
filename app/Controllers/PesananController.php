<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PesananController extends BaseController
{
	public function index()
	{
		if ($this->request->isAJAX())
		{
			return $this->getData();
		}else{
			$data['page'] = 'pages/pesanan_view';
		return view("main",$data);
		}
		
	}

	public function getData(){
		return $this->response->setJSON([
			"data"=> [],
			"draw"=> $this->request->getGet('draw'),
			"recordsTotal"=> 0,
			"recordsFiltered"=> 0
		]);
	}
}
