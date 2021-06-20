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
        return view('cpanel_item/cp_beranda');
    }
    public function buatlaporan()
    {
        return view('cpanel_item/cp_bu_laporan');        
    }
    public function statuslaporan()
    {
        return view('cpanel_item/cp_statuslap');
    }
}
