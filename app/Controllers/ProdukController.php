<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProdukController extends BaseController
{
	var $produk;

	public function __construct()
	{
		$this->produk = new \App\Models\Produk();
	}

	public function index()
	{
		$data['page'] = 'pages/produk_view';
		return view("main",$data);
	}

	public function getdata(){
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
			
		$data = $this->produk->findAll();
		return $this->response->setJSON($data);
	}

	public function store(){

		$input = $this->request->getPost();

		if ($this->produk->save($input) === false)
		{
			return  $this->response->setStatusCode(422)
				->setJSON([$this->produk->errors()]);
		}else
			return $this->response->setJSON(["message"=>"data berhasil di tambahkan"]);
	}

	public function show($id){
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
			
		return $this->response->setJSON($this->produk->find($id));
	}

	public function update($id){
		$input = $this->request->getPost();
		$this->produk->update($id,$input);
		return $this->response->setJSON(["message"=>"data berhasil di update"]);
	}

	public function destroy($id){
		$this->produk->delete($id);
		return $this->response->setJSON(["message"=>"data berhasil di hapus"]);
	}

}
