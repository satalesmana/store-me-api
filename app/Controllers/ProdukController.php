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
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		$data = $this->produk->findAll();
		return json_encode($data);
	}

	public function store(){

		$input = $this->request->getPost();
		$this->produk->save($input);
		if ($this->produk->save($input) === false)
		{
			return  $this->response->setStatusCode(422)
				->setJSON([$this->produk->errors()]);
		}else
			return $this->response->setJSON(["message"=>"data berhasil di tambahkan"]);
	}

	public function show($id){
		echo json_encode($this->produk->find($id));
	}

	public function update($id){
		$input = $this->request->getPost();
		$this->produk->update($id,$input);
		echo json_encode(["message"=>"data berhasil di update"]);
	}

	public function destroy($id){
		$this->produk->delete($id);
		echo json_encode(["message"=>"data berhasil di hapus"]);
	}

}
