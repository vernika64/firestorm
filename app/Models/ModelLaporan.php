<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'laporan';
	protected $primaryKey           = 'kode_laporan';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'kode_laporan',
		'kode_identitas',
		'judul_laporan',
		'desc_laporan',
		'kode_divisi',
		'map_file',
		'status',
		'tanggapan',
		'tgl_lap_masuk',
		'tgl_lap_update',
		'tgl_lap_status'
	];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'tgl_lap_masuk';
	protected $updatedField         = 'tgl_lap_update';
	// protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
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
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
