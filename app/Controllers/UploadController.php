<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UploadController extends BaseController
{
	public function index()
	{
		$data['page'] = 'pages/upload_view';
		return view('main',$data);
	}

	public function create(){

		$input = $this->request->getPost();
		$input['photo'] = "-";
		try{
			$photo = $this->request->getFile('photo');
			$file_name = $photo->getRandomName();
			$file_path = 'uploads';
			$photo->move("./".$file_path,$file_name);
			$input['photo'] = base_url()."/".$file_path."/".$file_name;
		}catch(\Exception $e){}

		if ($this->produk->save($input) === false)
		{
			return  $this->response->setStatusCode(422)
				->setJSON([$this->produk->errors()]);
		}else
			return $this->response->setJSON(["message"=>"data berhasil di tambahkan"]);
	}
}
