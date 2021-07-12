<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KeranjangController extends BaseController
{
	public function index()
	{
		$produkModel= new \App\Models\Produk();
		$data		= [];
		$total_data = 0;
		$prudukId 	= $this->request->getGet('produkId');
		$arProdId	= explode(",",$prudukId);
		$produk		= $produkModel->find($arProdId);
		$qty 		= 1;
		
		foreach($produk as $key=>$item){
			$data[$key]['nama_produk'] 	= $item['nama_produk'];
			$data[$key]['harga_satuan'] = number_format($item['harga_jual']);
			$data[$key]['qty']			= $qty;
			$data[$key]['total'] 		= number_format($qty * $item['harga_jual']);
		}

		return $this->response->setJSON([
			"data"=> $data,
			"draw"=> $this->request->getGet('draw'),
			"recordsTotal"=> count($produk),
			"recordsFiltered"=> count($produk)
		]);
	}
}
