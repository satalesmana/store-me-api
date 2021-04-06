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
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
			
		$kategori = new \App\Models\Kategori();
		
		$kategoriList = $kategori->paginate(10, 'group1', null,10 );

		echo json_encode([
			"data"=>$kategoriList
		]);
	}

	public function show($id){
		$kategori = new \App\Models\Kategori();
		$output = $kategori->find($id);
		echo json_encode($output);
	}

	public function update($id){
		$kategori = new \App\Models\Kategori();
		$input=$this->request->getPost();
		$kategori->update($id,$input);
		echo json_encode(["message"=>"data berhasil di rubah"]);
	}

	public function destroy($id){
		$kategori = new \App\Models\Kategori();
		$kategori->delete($id);
		echo json_encode(["message"=>"data berhasil di hapus"]);
	}

	public function store(){
		$kategori = new \App\Models\Kategori();
		$input = $this->request->getPost();

		$kategori->insert($input);
		echo json_encode(["pesan"=>"data berhasil disimpan"]);
	}
}
