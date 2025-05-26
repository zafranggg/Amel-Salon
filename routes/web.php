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
Route::get('/selengkap_riwayat_tr', function () {
    return view('admin.selengkap_riwayat_tr');
});
Route::get('/riwayat_booking', function () {
    return view('admin.riwayat_booking');
});
Route::get('/selengkap_riwayat_bk', function () {
    return view('admin.selengkap_riwayat_bk');
});
Route::get('/jadwal_treatment', function () {
    return view('admin.jadwal_treatment');
});
Route::get('/treatment_salon', function () {
    return view('admin.treatment_salon');
});
Route::get('/transaksi_pembayaran', function () {
    return view('admin.transaksi_pembayaran');
});