<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use App\Pelanggan;
use App\Karyawan;
use App\Sewa;
use DB;

class Dashboard extends Controller
{

    public function ambil()
    {
    	$data["mobil"] = Mobil::count();
    	$data["pelanggan"] = Pelanggan::count();
    	$data["karyawan"] = Karyawan::count();
        $data["sewa"] = Sewa::count();

    	return view('dashboard', $data);
    }

    public function __construct()
    {
        $this->middleware("check_login");
    }

}
