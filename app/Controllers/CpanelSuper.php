<?php

namespace App\Controllers;

class CpanelSuper extends BaseController
{
    public function dashboard()
	{
        return view('cpanel_spuser/dashboard');
    }
    public function laporan_masuk()
	{
        return view('cpanel_spuser/lap_masuk');
    }
    public function laporan_konfirm()
	{
        return view('cpanel_spuser/lap_konfirm');
    }
    public function laporan_acc()
	{
        return view('cpanel_spuser/lap_acc');
    }

}