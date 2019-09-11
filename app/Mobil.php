<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = "mobil";
    protected $primaryKey = "id_mobil";
    protected $fillable = ["id_mobil", "nomor_mobil", "merk", "warna", "stok", "biaya_sewa", "image"];
    public $incrementing = false; //agar primary key dapat diisi char
}
