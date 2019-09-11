<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $primaryKey = "id_karyawan";
    protected $fillable = ["id_karyawan", "nama", "alamat", "kontak", "username", "password"];
    public $incrementing = false; //agar primary key dapat diisi char
}
