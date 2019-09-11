<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->string("id_pelanggan", 100)->primary();
            $table->string("nama", 300);
            $table->string("alamat", 300);
            $table->string("kontak", 300);
            $table->string("image", 300);
            $table->timestamps();
        });

        Schema::create('karyawan', function (Blueprint $table) {
            $table->string("id_karyawan", 100)->primary();
            $table->string("nama", 300);
            $table->string("alamat", 300);
            $table->string("kontak", 300);
            $table->timestamps();
        });

        Schema::create('mobil', function (Blueprint $table) {
            $table->string("id_mobil", 100)->primary();
            $table->string("nomor_mobil", 300);
            $table->string("merk", 300);
            $table->string("warna", 300);
            $table->string("stok", 300);
            $table->double("biaya_sewa", 300);
            $table->string("image", 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
