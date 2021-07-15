<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUserCpanel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cpanel_user';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'username',
		'password',
		'nama',
		'kd_divisi',
		'level'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'tanggal_reg';
	protected $updatedField         = 'tanggal_upd';
	// protected $deletedField         = 'deleted_at';

	// Validation
	// protected $validationRules      = [];
	// protected $validationMessages   = [];
	// protected $skipValidation       = false;
	// protected $cleanValidationRules = true;

	// // Callbacks
	// protected $allowCallbacks       = true;
	// protected $beforeInsert         = [];
	// protected $afterInsert          = [];
	// protected $beforeUpdate         = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $afterFind            = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];
}
