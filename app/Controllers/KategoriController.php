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
            ->setHeader('Access-Control-Allow-Methods', 'GET');

		$kategori 		= new \App\Models\Kategori();
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
		
		
		$total_data = count($kategori->findAll());
		if($keyword['value'] !=''){
			$total_data = count($kategori->orderBy($column_order, $order[0]['dir'])
				->like("nama_kategori","%".$keyword['value']."%")
				->findAll());
		}

		$data = $kategori->orderBy($column_order, $order[0]['dir'])
			->like("nama_kategori","%".$keyword['value']."%")
			->paginate($totalPerpage, "group", $pages);

		return $this->response->setJSON([
			"data"=> $data,
			"draw"=> $this->request->getGet('draw'),
			"recordsTotal"=> $total_data,
			"recordsFiltered"=> $total_data
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

		try{
			$gambar = $this->request->getFile('images');
			$file_name = $gambar->getRandomName();
			$file_path = 'uploads';
			$gambar->move("./".$file_path,$file_name);
			$input['images'] = base_url()."/".$file_path."/".$file_name;
		}catch(\Exception $e){}
		

		$kategori->insert($input);
		return $this->response->setJSON(["pesan"=>"data berhasil disimpan"]);
	}
}
