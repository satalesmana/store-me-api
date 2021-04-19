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

		$pages = ($this->request->getGet('pages') != '' ) ? $this->request->getGet('pages') : 1;

		$kategori = new \App\Models\Kategori();

		return $this->response->setJSON([
			"data"=> $kategori->paginate(2,'group1',$pages),
			"pager"=>[
				"total"=> count($kategori->findAll()),
				"perpage"=> 2,
				"pages"	=> (int) $pages
			]
		]);
	}

	public function show($id){
		$kategori = new \App\Models\Kategori();
		$output = $kategori->find($id);
		return $this->response->setJSON($output);
	}

	public function update($id){
		$kategori = new \App\Models\Kategori();
		$input=$this->request->getPost();
		$kategori->update($id,$input);
		return $this->response->setJSON(["message"=>"data berhasil di rubah"]);
	}

	public function destroy($id){
		$kategori = new \App\Models\Kategori();
		$kategori->delete($id);
		return $this->response->setJSON(["message"=>"data berhasil di hapus"]);
	}

	public function store(){
		$kategori = new \App\Models\Kategori();
		$input = $this->request->getPost();

		$path = $this->request->getFile('images')->store();
		
		$input['images'] = $path;

		$kategori->insert($input);
		return $this->response->setJSON(["pesan"=>"data berhasil disimpan"]);
	}
}
