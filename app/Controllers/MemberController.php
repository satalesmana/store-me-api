<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MemberController extends BaseController
{
	public function __construct()
	{
		$this->member = new \App\Models\Member();
	}

	public function index()
	{
		$data['page'] = 'pages/member_view';
		return view("main",$data);
	}

	public function getdata()
	{
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
		$pages = ($this->request->getGet('pages') !='' ) ? $this->request->getGet('pages') : 1;
		$perpages = ($this->request->getGet('perpages') !='' ) ? $this->request->getGet('perpages') : 10;

		return $this->response->setJSON([
			'data' => $this->member->paginate($perpages,'group1',$pages),
			'pager' =>[
				'total'=> count($this->member->findAll()),
				'perpage'=> $perpages,
				'pages' =>  $pages
			]
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
