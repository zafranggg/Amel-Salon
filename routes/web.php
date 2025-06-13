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
Route::get('/daribooking', function () {
    return view('admin.daribooking');
});
Route::get('/menunggu_jadwal', function () {
    return view('admin.menunggu_jadwal');
});
Route::get('/menunggu_konfirmasi', function () {
    return view('admin.menunggu_konfirmasi');
});
Route::get('/edit_booking', function () {
    return view('admin.edit_booking');
});
Route::get('/bahan_baku', function () {
    return view('admin.bahan_baku');
});
Route::get('/detail_baku', function () {
    return view('admin.detail_baku');
});
Route::get('/riwayat_baku', function () {
    return view('admin.riwayat_baku');
});
Route::get('/laporan_keuangan', function () {
    return view('admin.laporan_keuangan');
});
Route::get('/riwayat_keuangan', function () {
    return view('admin.riwayat_keuangan');
});
Route::get('/detail_keuangan', function () {
    return view('admin.detail_keuangan');
});
Route::get('/kelola_informasi_salon', function () {
    return view('admin.kelola_informasi_salon');
});
Route::get('/profil', function () {
    return view('admin.profil');
});
Route::get('/ganti_pw', function () {
    return view('admin.ganti_pw');
});