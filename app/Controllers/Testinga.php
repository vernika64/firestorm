<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Testing;

class Testinga extends BaseController
{
	public function index()
	{
		$model = new Testing();
		$builder = $model->table('mytable');
		$query   = $builder->get();
		var_dump($query);
	}
}
