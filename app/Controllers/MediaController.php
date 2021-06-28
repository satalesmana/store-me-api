<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MediaController extends BaseController
{
	public function __construct()
	{
		$this->media = new \App\Models\Media();
	}

	public function view(){
		return view('media');
	}

	public function get($id = NULL){
		if(! $id){
			return $this->response->setJSON($this->media->findAll());
		}
		return $this->response->setJSON($this->media->where('id', $id)->findAll());
	}

	public function add(){
		$media = $this->request->getFile('file')->store('../../public/uploads');
		$url = base_url().str_replace('../../public', '', $media);
		if($this->media->addMedia($url)){
			return $this->response->setJSON(['message' => 'Media berhasil diupload', 'url' => $url]);
		}
	}
}
