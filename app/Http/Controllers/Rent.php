<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;
use App\Mobil;
use App\Pelanggan;
use App\Karyawan;
use Session;

class Rent extends Controller
{
    public function index()
    {
    	$data["mobils"] = Mobil::all();
    	$data["pelanggans"] = Pelanggan::all();
    	$data["karyawans"] = Karyawan::all();
    	return view("rent", $data);
    }

    public function search(Request $request)
    {
        $data["report"] = Sewa::where("id_pelanggan","like","%$request->search%")
        ->orWhere("id_pelanggan","like","%$request->search%")
        ->orWhere("id_mobil","like","%$request->search%")
        ->orWhere("id_karyawan","like","%$request->search%")->paginate(4);

        $data["count"] = Sewa::where("id_pelanggan","like","%$request->search%")
        ->orWhere("id_pelanggan","like","%$request->search%")
        ->orWhere("id_mobil","like","%$request->search%")
        ->orWhere("id_karyawan","like","%$request->search%")->count();

        return view('laporan', $data);
    }

    public function save_rent(Request $request)
    {
    	try {
    		// fungsi insert ke table sewa
    		$sewa = new Sewa(); // Sewa() adalah model
    		$sewa->id_sewa = rand(1,9999).rand(1,9999);
    		$sewa->id_mobil = $request->id_mobil;
    		$sewa->id_karyawan = Session::get('karyawan')->id_karyawan;
    		$sewa->id_pelanggan = $request->id_pelanggan;
    		$sewa->tgl_sewa = $request->tgl_sewa;
    		$sewa->tgl_kembali = $request->tgl_kembali;
	
    		// hitung selisih tgl_sewa dan tgl_kembali
    		$tgl_sewa = date_create($request->tgl_sewa);
    		$tgl_kembali = date_create($request->tgl_kembali);
    		$selisih = date_diff($tgl_sewa,$tgl_kembali)->days;
	
    		// ambil data mobil
    		$mobil = Mobil::where("id_mobil", $request->id_mobil)->first();
    		$biaya = $mobil->biaya_sewa;
    		$sewa->total_bayar = $selisih*$biaya;
    		$sewa->save();
    		return redirect('rent')->with("message","Berhasil!");
    	} catch (Exception $e) {
    		return redirect("rent")->with("message", $e->getMessage());
    	}
    }

    public function __construct()
    {
        $this->middleware("check_login");
    }

    public function report()
    {
        $data["report"] = Sewa::paginate(4);
        return view("laporan", $data);
    }
}
