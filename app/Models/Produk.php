<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'produk';
	protected $primaryKey           = 'produk_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nama_produk','kategori_id','keterangan'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'nama_produk' => 'required',
		'kategori_id' => 'required'
	];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = ['kategoriById'];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	protected function kategoriById(array $data){
		$ketegoriModel = model('App\Models\Kategori', false);
		if(isset($data['data'][0])){
			foreach( $data['data'] as $key => $value ){
				$data['data'][$key]['kategori'] = $ketegoriModel->find($value['kategori_id']);
			}
		}else{
			if($data['data']['kategori_id'])
				$data['data']['kategori'] = $ketegoriModel->find($data['data']['kategori_id']);
		}
		
		return $data;
	}

}
