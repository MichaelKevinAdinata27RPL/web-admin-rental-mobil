<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class Api_P extends Controller
{
    public function get_pelanggan_api(){
      $data["pelanggan"] = Pelanggan::all();
      return response($data);
    }

    public function delete_pelanggan_api(Request $request)
    {
    	$id_pelanggan = $request->id_pelanggan;
    	$count = Pelanggan::where("id_pelanggan",$id_pelanggan)->count();
    	if ($count > 0) {
    		$karyawan = Pelanggan::where("id_pelanggan",$id_pelanggan)->first();
    		Pelanggan::where("id_pelanggan",$id_pelanggan)->delete();
    		$response = ["message" => "Data berhasil dihapus"];
    	}else {
    		$response = ["message" => "Data tidak ada"];
    	}
    	return response($response);
    }

    public function save_pelanggan_api(Request $request){
      // catch the request from user
      $id_pelanggan = $request->id_pelanggan;
      $nama = $request->nama;
      $alamat = $request->alamat;
      $kontak = $request->kontak;
      $image = $request->image;

      $count = Pelanggan::where("id_pelanggan",$id_pelanggan)->count();
      if ($count > 0) {
        // update data
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
        $response = ["message" => "Data berhasil diubah"];
      }else {
        // insert data
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
        $response = ["message" => "Data berhasil ditambahkan"];
      }
      return response($response);
    }
}
