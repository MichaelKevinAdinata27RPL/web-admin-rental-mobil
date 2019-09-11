<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class Pengguna extends Controller
{

    public function get_pelanggan()
    {
    	$data["pelanggans"] = Pelanggan::paginate(4);
    	return view("pelanggan", $data);
    }

    public function search(Request $request)
    {
        $data["pelanggans"] = Pelanggan::where("id_pelanggan","like","%$request->search%")
        ->orWhere("nama","like","%$request->search%")
        ->orWhere("alamat","like","%$request->search%")
        ->orWhere("kontak","like","%$request->search%")->paginate(4);

        $data["count"] = Pelanggan::where("id_pelanggan","like","%$request->search%")
        ->orWhere("nama","like","%$request->search%")
        ->orWhere("alamat","like","%$request->search%")
        ->orWhere("kontak","like","%$request->search%")->count();

        return view('pelanggan', $data);
    }

    public function save_pelanggan(Request $request)
    {
    	try {
    		$action = $request->action;
    		if ($action == "insert") {
    			$pelanggan = new Pelanggan();
    			$file = $request->image;
    			$pelanggan->id_pelanggan = $request->id_pelanggan;
    			$pelanggan->nama = $request->nama;
    			$pelanggan->alamat = $request->alamat;
    			$pelanggan->kontak = $request->kontak;
    			$fileName = $request->id_pelanggan."-".time().".".$file->extension();
    			$pelanggan->image = $fileName;
    			$pelanggan->save();
    			$file->storeAs('public/fotoPelanggan', $fileName);
    		}else if($action == "update"){
    			$pelanggan = Pelanggan::where("id_pelanggan", $request->id_pelanggan)->first();
    			if ($request->hasFile("image")) {
    				$path = public_path('storage/fotoPelanggan'.$pelanggan->image);
    				if (file_exists($path)) {
    					unlink($path);
    				}
    				$file = $request->image;
    				$fileName = $request->id_pelanggan."-".time().".".$file->extension();
    				$pelanggan->image = $fileName;
    				$file->storeAs('public/fotoPelanggan', $fileName);
    			}
    			$pelanggan->nama = $request->nama;
    			$pelanggan->alamat = $request->alamat;
    			$pelanggan->kontak = $request->kontak;
    			$pelanggan->save();
    		}
    		return redirect("pelanggan")->with("message", "Data berhasil disimpan");
    	} catch (Exception $e) {
    		return redirect("pelanggan")->with("message", $e->getMessage());
    	}
    }

    public function delete_pelanggan($id_pelanggan)
    {
    	try {
    		$pelanggan = Pelanggan::where("id_pelanggan",$id_pelanggan)->first();
    		$path = public_path('storage/fotoPelanggan/'.$pelanggan->image);
    		if ($path) {
    			unlink($path);
    		}
    		Pelanggan::where("id_pelanggan",$id_pelanggan)->delete();
    		return redirect("pelanggan")->with("message", "Data berhasil dihapus");
    	} catch (Exception $e) {
    		return redirect("pelanggan")->with("message", $e->getMessage());
    	}
    }

    public function __construct()
    {
        $this->middleware("check_login");
    }
}
