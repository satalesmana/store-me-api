<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KategoriController extends BaseController
{
	public function index()
	{
		$kategori = new \App\Models\Kategori();
		

		$data['kategori_list'] = $kategori->findAll();
		$data['page'] = 'pages/kategori_view';
		return view("main",$data);
	}

	public function getdata(){
		$kategori = new \App\Models\Kategori();
		echo json_encode($kategori);
	}

	public function store(){
		$kategori = new \App\Models\Kategori();
		$input = $this->request->getPost();

		$kategori->insert($input);

		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
			strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
				echo json_encode(["pesan"=>"data berhasil disimpan"]);
		}else
			return redirect()->to('/kategori');
	}
}
