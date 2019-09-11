<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;

class Api_M extends Controller
{
    public function get_mobil_api(){
      $data["mobil"] = Mobil::all();
      return response($data);
    }

    public function delete_mobil_api(Request $request)
    {
    	$id_mobil = $request->id_mobil;
    	$count = Mobil::where("id_mobil",$id_mobil)->count();
    	if ($count > 0) {
    		$mobil = Mobil::where("id_mobil",$id_mobil)->first();
    		Mobil::where("id_mobil",$id_mobil)->delete();
    		$response = ["message" => "Data berhasil dihapus"];
    	}else {
    		$response = ["message" => "Data tidak ada"];
    	}
    	return response($response);
    }

    public function save_mobil_api(Request $request){
      // catch the request from user
      $id_mobil = $request->id_mobil;
      $nomor_mobil = $request->nomor_mobil;
      $merk = $request->merk;
      $warna = $request->warna;
      $stok = $request->stok;
      $biaya_sewa = $request->biaya_sewa;
      $image = $request->image;

      $count = Mobil::where("id_mobil",$id_mobil)->count();
      if ($count > 0) {
        // update data
        $mobil = Mobil::where("id_mobil", $request->id_mobil)->first();
    	if ($request->hasFile("image")) {
    		$path = public_path('storage/fotoMobil'.$mobil->image);
    		if (file_exists($path)) {
    			unlink($path);
    		}
    		$file = $request->image;
    		$fileName = $request->id_pelanggan."-".time().".".$file->extension();
    		$mobil->image = $fileName;
    		$file->storeAs('public/fotoMobil', $fileName);
    	}
    	$mobil->id_mobil = $request->id_mobil;
    	$mobil->nomor_mobil = $request->nomor_mobil;
    	$mobil->merk = $request->merk;
    	$mobil->warna = $request->warna;
    	$mobil->stok = $request->stok;
    	$mobil->biaya_sewa = $request->biaya_sewa;
    	$mobil->save();
        $response = ["message" => "Data berhasil diubah"];
      }else {
        // insert data
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
        $response = ["message" => "Data berhasil ditambahkan"];
      }
      return response($response);
    }
}
