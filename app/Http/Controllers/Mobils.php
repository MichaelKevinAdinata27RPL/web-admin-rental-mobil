<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;

class Mobils extends Controller
{
    public function get_mobil()
    {
    	$data["mobils"] = Mobil::paginate(4);
    	return view("mobil", $data);
    }

    public function search(Request $request)
    {
        $data["mobils"] = Mobil::where("id_mobil","like","%$request->search%")
        ->orWhere("nomor_mobil","like","%$request->search%")
        ->orWhere("merk","like","%$request->search%")
        ->orWhere("warna","like","%$request->search%")->paginate(4);

        $data["count"] = Mobil::where("id_mobil","like","%$request->search%")
        ->orWhere("nomor_mobil","like","%$request->search%")
        ->orWhere("merk","like","%$request->search%")
        ->orWhere("warna","like","%$request->search%")->count();

        return view('mobil', $data);
    }

    public function save_mobil(Request $request)
    {
    	try {
    		$action = $request->action;
    		if ($action == "insert") {
    			$mobil = new Mobil();
    			$file = $request->image;
    			$mobil->id_mobil = $request->id_mobil;
    			$mobil->nomor_mobil = $request->nomor_mobil;
    			$mobil->merk = $request->merk;
    			$mobil->warna = $request->warna;
    			$mobil->stok = $request->stok;
    			$mobil->biaya_sewa = $request->biaya_sewa;
    			$fileName = $request->id_mobil."-".time().".".$file->extension();
    			$mobil->image = $fileName;
    			$mobil->save();
    			$file->storeAs('public/fotoMobil', $fileName);
    		}else if($action == "update"){
    			$mobil = Mobil::where("id_mobil", $request->id_mobil)->first();
    			if ($request->hasFile("image")) {
    				$path = public_path('storage/fotoMobil'.$mobil->image);
    				if (file_exists($path)) {
    					unlink($path);
    				}
    				$file = $request->image;
    				$fileName = $request->id_mobil."-".time().".".$file->extension();
    				$mobil->image = $fileName;
    				$file->storeAs('public/fotoMobil', $fileName);
    			}
    			$mobil->nomor_mobil = $request->nomor_mobil;
    			$mobil->merk = $request->merk;
    			$mobil->warna = $request->warna;
    			$mobil->stok = $request->stok;
    			$mobil->biaya_sewa = $request->biaya_sewa;
    			$mobil->save();
    		}
    		return redirect("mobil")->with("message", "Data berhasil disimpan");
    	} catch (Exception $e) {
    		return redirect("mobil")->with("message", $e->getMessage());
    	}
    }

    public function delete_mobil($id_mobil)
    {
    	try {
    		$mobil = Mobil::where("id_mobil",$id_mobil)->first();
    		$path = public_path('storage/fotoMobil/'.$mobil->image);
    		if ($path) {
    			unlink($path);
    		}
    		Mobil::where("id_mobil",$id_mobil)->delete();
    		return redirect("mobil")->with("message", "Data berhasil dihapus");
    	} catch (Exception $e) {
    		return redirect("mobil")->with("message", $e->getMessage());
    	}
    }

    public function __construct()
    {
        $this->middleware("check_login");
    }
}
