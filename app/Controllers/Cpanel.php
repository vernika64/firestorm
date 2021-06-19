<?php

namespace App\Controllers;

class Cpanel extends BaseController
{
	public function index()
	{
		return view('Login');
	}
    public function dashboard()
    {
        echo view('Header');
        echo view('TI/ti_beranda');    
        echo view('Footer');
    }
    public function buatlaporan()
    {
        echo view('Header');
        echo view('TI/ti_bu_laporan');
        echo view('Footer');
    }
}
