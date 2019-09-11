<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $table = "sewa";
    protected $primaryKey = "id_sewa";
    protected $fillable = ["id_sewa", "id_mobil", "id_karyawan", "id_pelanggan", "tgl_sewa", "tgl_kembali", "total_bayar"];

    public $incrementing = false; //agar primary key dapat diisi char

    public function karyawan()
    {
    	return $this->belongsTo("App\Karyawan", "id_karyawan");
    }

    public function pelanggan()
    {
    	return $this->belongsTo("App\Pelanggan", "id_pelanggan");
    }

    public function mobil()
    {
    	return $this->belongsTo("App\Mobil", "id_mobil");
    }


}
