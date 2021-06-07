<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;

class DropdownController extends BaseController
{
	public function categoriitem()
	{
		$kategori = new \App\Models\Kategori();
        return  $this->response->setJSON(
            $kategori->findAll()
        );
	}
}
