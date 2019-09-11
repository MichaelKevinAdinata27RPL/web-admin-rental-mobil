<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = "pelanggan";
    protected $primaryKey = "id_pelanggan";
    protected $fillable = ["id_pelanggan", "nama", "alamat", "kontak", "image"];
    public $incrementing = false; //agar primary key dapat diisi char
}
