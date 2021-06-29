<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBioPelapor extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'bio_pelapor';
	protected $primaryKey           = 'kode_identitas';
	protected $useAutoIncrement     = false;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	// protected $useSoftDeletes       = false;
	// protected $protectFields        = true;
	protected $allowedFields        = [
		'kode_identitas',
		'nama',
		'status',
		'tgl_lahir',
		'kota_asal',
		'no_hp',
		'email',
		'password',
		'tgl_daftar'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'tgl_daftar';
	protected $updatedField         = 'tgl_update';
	// protected $deletedField         = 'deleted_at';

	// // Validation
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
