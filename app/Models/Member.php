<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'members';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nama_member','email','password','foto','alamat'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'nama_member' => 'required',
		'email' => 'required',
		'password'=>'required'
	];
	protected $validationMessages   = [
		'nama_member'=>[
			'required'=>'Nama member harus di isi'
		],
		'email'=>[
			'required'=>'Alamat email harus di isi'
		],
		'password'=>[
			'required'=>'password harus di isi'
		]
	];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
