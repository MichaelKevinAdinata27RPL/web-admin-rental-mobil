<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class Pegawai extends Controller
{
    public function get_karyawan()
    {
    	$data["karyawans"] = Karyawan::paginate(4);
    	return view("karyawan", $data);
    }

    public function search(Request $request)
    {
        $data["karyawans"] = Karyawan::where("id_karyawan","like","%$request->search%")
        ->orWhere("nama","like","%$request->search%")
        ->orWhere("alamat","like","%$request->search%")
        ->orWhere("kontak","like","%$request->search%")->paginate(4);

        $data["count"] = Karyawan::where("id_karyawan","like","%$request->search%")
        ->orWhere("nama","like","%$request->search%")
        ->orWhere("alamat","like","%$request->search%")
        ->orWhere("kontak","like","%$request->search%")->count();

        return view('karyawan', $data);
    }


    public function save_karyawan(Request $request)
    {
    	try {
    		$action = $request->action;
    		if ($action == "insert") {
    			$karyawan = new Karyawan();
    			$karyawan->id_karyawan = $request->id_karyawan;
    			$karyawan->nama = $request->nama;
    			$karyawan->alamat = $request->alamat;
    			$karyawan->kontak = $request->kontak;
                $karyawan->username = $request->username;
                $karyawan->password = md5($request->password);
    			$karyawan->save();
    		}else if($action == "update"){
    			$karyawan = Karyawan::where("id_karyawan", $request->id_karyawan)->first();
    			$karyawan->nama = $request->nama;
    			$karyawan->alamat = $request->alamat;
    			$karyawan->kontak = $request->kontak;
                $karyawan->username = $request->username;
                $karyawan->password = md5($request->password);
    			$karyawan->save();
    		}
    		return redirect("karyawan")->with("message", "Data berhasil disimpan");
    	} catch (Exception $e) {
    		return redirect("karyawan")->with("message", $e->getMessage());
    	}
    }

    public function delete_karyawan($id_karyawan)
    {
    	try {
    		$karyawan = Karyawan::where("id_karyawan",$id_karyawan)->first();
    		Karyawan::where("id_karyawan",$id_karyawan)->delete();
    		return redirect("karyawan")->with("message", "Data berhasil dihapus");
    	} catch (Exception $e) {
    		return redirect("karyawan")->with("message", $e->getMessage());
    	}
    }

    public function __construct()
    {
        $this->middleware("check_login");
    }
}
