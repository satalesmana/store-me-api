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
		$filter = $this->request->getGet('keyword');
		$data = [];


		$produk 		= new \App\Models\Produk();
		$order 			= $this->request->getGet('order');
		$column 		= $this->request->getGet('columns');
		$column_order 	= $column[$order[0]['column']]['data'];
		$keyword 		= $this->request->getGet('search');
		$totalPerpage 	= $this->request->getGet('length');
		$start 			= $this->request->getGet('start');
		
		$pages = 1;
		if($start > 0){
			$pages = floor($start / $totalPerpage) + 1;
		}
		
		
		$total_data = count($produk->findAll());
		if($keyword['value'] !=''){
			$total_data = count($produk->orderBy($column_order, $order[0]['dir'])
				->like("nama_produk","%".$keyword['value']."%")
				->findAll());
		}

		$data = $produk->orderBy($column_order, $order[0]['dir'])
			->like("nama_produk","%".$keyword['value']."%")
			->paginate($totalPerpage, "group", $pages);

		return $this->response->setJSON([
			"data"=> $data,
			"draw"=> $this->request->getGet('draw'),
			"recordsTotal"=> $total_data,
			"recordsFiltered"=> $total_data
		]);
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
