<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;


class Api_K extends Controller
{

    public function get_karyawan_api(){
      $data["karyawan"] = Karyawan::all();
      return response($data);
    }

    public function delete_karyawan_api(Request $request)
    {
    	$id_karyawan = $request->id_karyawan;
    	$count = Karyawan::where("id_karyawan",$id_karyawan)->count();
    	if ($count > 0) {
    		$karyawan = Karyawan::where("id_karyawan",$id_karyawan)->first();
    		Karyawan::where("id_karyawan",$id_karyawan)->delete();
    		$response = ["message" => "Data berhasil dihapus"];
    	}else {
    		$response = ["message" => "Data tidak ada"];
    	}
    	return response($response);
    }

    public function save_karyawan_api(Request $request){
      // catch the request from user
      $id_karyawan = $request->id_karyawan;
      $nama = $request->nama;
      $alamat = $request->alamat;
      $kontak = $request->kontak;
      $username = $request->username;
      $password = md5($request->password);

      $count = Karyawan::where("id_karyawan",$id_karyawan)->count();
      if ($count > 0) {
        // update data
        $karyawan = Karyawan::where("id_karyawan",$id_karyawan)->first();
        $karyawan->id_karyawan = $request->id_karyawan;
    	$karyawan->nama = $request->nama;
    	$karyawan->alamat = $request->alamat;
    	$karyawan->kontak = $request->kontak;
        $karyawan->username = $request->username;
        $karyawan->password = md5($request->password);
        $karyawan->save();
        $response = ["message" => "Data berhasil diubah"];
      }else {
        // insert data
        $karyawan = new Karyawan();
        $karyawan->id_karyawan = $request->id_karyawan;
    	$karyawan->nama = $request->nama;
    	$karyawan->alamat = $request->alamat;
    	$karyawan->kontak = $request->kontak;
        $karyawan->username = $request->username;
        $karyawan->password = md5($request->password);
        $karyawan->save();
        $response = ["message" => "Data berhasil ditambahkan"];
      }
      return response($response);
    }

}
