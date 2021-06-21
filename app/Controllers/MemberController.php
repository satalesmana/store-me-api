<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MemberController extends BaseController
{
	var $member;
	
	public function __construct()
	{
		$this->member = new \App\Models\Member();
	}

	public function index()
	{
		$data['page'] = 'pages/member_view';
		return view("main",$data);
	}

	public function getdata(){
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
		$filter = $this->request->getGet('keyword');
		$data = [];


		$member 		= new \App\Models\Member();
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
		
		
		$total_data = count($member->findAll());
		if($keyword['value'] !=''){
			$total_data = count($member->orderBy($column_order, $order[0]['dir'])
				->like("nama_member","%".$keyword['value']."%")
				->findAll());
		}

		$data = $member->orderBy($column_order, $order[0]['dir'])
			->like("nama_member","%".$keyword['value']."%")
			->paginate($totalPerpage, "group", $pages);

		return $this->response->setJSON([
			"data"=> $data,
			"draw"=> $this->request->getGet('draw'),
			"recordsTotal"=> $total_data,
			"recordsFiltered"=> $total_data
		]);
	}

	public function edit($id){

	}

	public function show($id){

	}

	public function create(){
		$input = $this->request->getPost();

		try {
			$foto = $this->request->getFile('foto')->store();
			$input['foto'] = $foto;
		} catch (\Exception $e) { }
			
		if ($this->member->save($input) === false)
		{
			return  $this->response->setStatusCode(422)
				->setJSON([$this->member->errors()]);
		}else
			return $this->response->setJSON(["message"=>"data berhasil di tambahkan"]);
	}

	public function update($id){

	}

	public function delete($id){

	}

}
