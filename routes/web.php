<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/daftar', function () {
    return view('daftar');
});
Route::get('/beranda', function () {
    return view('admin.beranda');
});
Route::get('/data_pelanggan', function () {
    return view('admin.data_pelanggan');
});
Route::get('/detail_pelanggan', function () {
    return view('admin.detail_pelanggan');
});
Route::get('/riwayat_layanan', function () {
    return view('admin.riwayat_layanan');
});