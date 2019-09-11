<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get("/login", "Login@index");
Route::post("/check_login", "Login@check");
Route::get("/logout", "Login@logout");

Route::get("/dashboard", "Dashboard@ambil");

Route::get("/pelanggan", "Pengguna@get_pelanggan");
Route::post("/save_pelanggan", "Pengguna@save_pelanggan");
Route::get("/delete_pelanggan/{id_pelanggan}", "Pengguna@delete_pelanggan");

Route::get("/mobil", "Mobils@get_mobil");
Route::post("/save_mobil", "Mobils@save_mobil");
Route::get("/delete_mobil/{id_mobil}", "Mobils@delete_mobil");

Route::get("/karyawan", "Pegawai@get_karyawan");
Route::post("/save_karyawan", "Pegawai@save_karyawan");
Route::get("/delete_karyawan/{id_karyawan}", "Pegawai@delete_karyawan");

Route::get("/rent", "Rent@index");
Route::post("/save_rent", "Rent@save_rent");

Route::get("/laporan", "Rent@report");

Route::post('save_karyawan_api', 'Api_K@save_karyawan_api');
Route::get('get_karyawan_api', 'Api_K@get_karyawan_api');
Route::post('delete_karyawan_api', 'Api_K@delete_karyawan_api');

Route::post('save_pelanggan_api', 'Api_P@save_pelanggan_api');
Route::get('get_pelanggan_api', 'Api_P@get_pelanggan_api');
Route::post('delete_pelanggan_api', 'Api_P@delete_pelanggan_api');

Route::post('save_mobil_api', 'Api_M@save_mobil_api');
Route::get('get_mobil_api', 'Api_M@get_mobil_api');
Route::post('delete_mobil_api', 'Api_M@delete_mobil_api');

Route::post('car/search', 'Mobils@search');
Route::post('customer/search', 'Pengguna@search');
Route::post('karyawan/search', 'Pegawai@search');
Route::post('laporan/search', 'Rent@search');