<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DaftarController;
use App\Http\Controllers\Auth\MasukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Pelanggan\TransaksiController as TransaksiPelangganController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Pelanggan\BookingController as JadwalBookingController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Pelanggan\BerandaController as BerandaPelangganController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Pelanggan\LayananController as LayananPelangganController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Pelanggan\ProfilController as ProfilPelangganController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\Pelanggan\TreatmentController as TreatmentPelangganController;
use App\Http\Controllers\BahanBakuController;

Route::get('/login', [MasukController:: class, 'showLoginForm'])-> middleware('guest')->name('login'); 
Route::post('/login', [MasukController:: class, 'login']);
Route::post('/logout', [MasukController::class, 'logout'])->name('logout');

Route::get('/daftar', [DaftarController::class, 'showRegistrationForm'])->middleware('guest'); 
Route::post('/daftar', [DaftarController::class, 'register']);

Route::get('/daftarAdmin', [DaftarController::class, 'showRegistrationAdminForm'])->middleware('guest'); 
Route::post('/daftarAdmin', [DaftarController::class, 'registerAdmin']);

Route::get('/', function () {
    return view('utama');
});

//pelanggan
Route::middleware('auth:pelanggan')->group(function () {

Route::get('/beranda', [BerandaPelangganController::class, 'index'])->name('pelanggan.beranda');

Route::get('/riwayat', [LayananPelangganController::class, 'riwayat'])->name('pelanggan.riwayat');


Route::get('/jadwal-booking', [JadwalBookingController::class, 'index'])->name('jadwal.booking');
Route::get('/jadwal-treatment/booking', [JadwalBookingController::class, 'index'])->name('jadwalbooking.create');
Route::post('/jadwal-treatment/booking', [JadwalBookingController::class, 'store'])->name('jadwalbooking.store');
Route::get('/jadwal/{tanggal}', [JadwalBookingController::class, 'jadwalTerisi']);

Route::get('/treatment-pelanggan', [TreatmentPelangganController::class, 'index'])->name('treatmentPelanggan.index');

Route::get('/riwayat-transaksi', [TransaksiPelangganController::class, 'index'])->name('transaksi.pelanggan');
Route::get('/riwayat-transaksi/{id}/detail', [TransaksiPelangganController::class, 'showDetail']);

Route::get('/dari-booking', [JadwalBookingController::class, 'dariBooking'])->name('booking.dari-booking');
Route::post('/dari-booking/{id}/diterima', [JadwalBookingController::class, 'diterima'])->name('booking-pelanggan.diterima');

Route::get('/menunggu-jadwal', [JadwalBookingController::class, 'menungguJadwal'])->name('booking.menunggu-Jadwal');
Route::post('/menunggu-jadwal/{id}/jadwal', [JadwalBookingController::class, 'jadwal'])->name('jadwal-pelanggan.diterima');

Route::get('/riwayat-transaksi/{id}/struk', [TransaksiPelangganController::class, 'cetakStruk'])->name('riwayat-transaksi.struk');

Route::get('/pelanggan-profil', [ProfilPelangganController::class, 'profil'])->name('profil-pelanggan    ');
Route::put('/pelanggan/profil/update', [ProfilPelangganController::class, 'update'])->name('pelanggan.updateProfil');
});

//admim
Route::middleware('auth')->group(function () {
Route::get('/dashboard', [BerandaController::class, 'index'])->name('dashboard');

Route::get('/data_pelanggan', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/data_pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/detail_pelanggan/{id}', [PelangganController::class, 'detail'])->name('pelanggan.detail');
Route::delete('hapus_pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

Route::get('/riwayat_layanan', [LayananController::class, 'daftarLayanan']);
Route::get('/detail_layanan/{id}', [LayananController::class, 'detailLayanan']);

Route::get('/selengkap_riwayat_tr', function () {
    return view('admin.selengkap_riwayat_tr');
});
Route::get('/riwayat_booking', function () {
    return view('admin.riwayat_booking');
});
Route::get('/selengkap_riwayat_bk', function () {
    return view('admin.selengkap_riwayat_bk');
});

Route::delete('/jadwal_treatment/staff/{id}', [BookingController::class, 'Sdestroy'])->name('staff.destroy');
Route::post('/jadwal_treatment/staff', [BookingController::class, 'Sstore'])->name('staff.store');
Route::get('/jadwal_treatment/booking', [BookingController::class, 'index'])->name('booking.create');
Route::post('/jadwal_treatment/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/jadwal-terisi/{tanggal}', [BookingController::class, 'jadwalTerisi']);
Route::get('/jadwal_treatment', [BookingController::class, 'index'])->name('jadwal.index');
Route::post('/jadwal_treatment/jadwal', [BookingController::class, 'Jstore'])->name('jadwal.store');
Route::delete('/jadwal_treatment/{id}', [BookingController::class, 'destroy'])->name('jadwal.destroy');


Route::resource('treatment', TreatmentController::class)->except(['create', 'edit', 'show']);

Route::get('/transaksi_pembayaran', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi_pembayaran', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/{id}/detail', [TransaksiController::class, 'getDetail'])->name('transaksi.detail');
Route::get('/transaksi/{id}/struk', [TransaksiController::class, 'cetakStruk'])->name('transaksi.struk');


Route::get('/daribooking', [BookingController::class, 'dariBooking'])->name('booking.dari_booking');
Route::post('/daribooking/{id}/diterima', [BookingController::class, 'diterima'])->name('booking.diterima');

Route::get('/menunggu_jadwal', [BookingController::class, 'menungguJadwal'])->name('booking.menunggu_Jadwal');
Route::post('/menunggu_jadwal/{id}/jadwal', [BookingController::class, 'jadwal'])->name('booking.jadwal');

Route::get('/menunggu_konfirmasi', [BookingController::class, 'menungguKonfirmasi'])->name('booking.menunggu_konfirmasi');
Route::post('/booking/{id}/konfirmasi', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');
Route::post('/booking/{id}/selesaikan', [BookingController::class, 'selesaikanPembayaran'])->name('booking.selesaikan');


Route::get('/edit_booking', function () {
    return view('admin.edit_booking');
});

Route::get('/bahan_baku', [BahanBakuController::class, 'index'])->name('bahan.index');
Route::post('/bahan_baku/store', [BahanBakuController::class, 'store'])->name('bahan.store');
Route::post('/bahan_baku/tambah-stok', [BahanBakuController::class, 'tambahStok'])->name('bahan.tambahStok');
Route::post('/bahan_baku/pakai', [BahanBakuController::class, 'pakaiStok'])->name('bahan.pakai');

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

Route::get('/ganti_pw', function () {
    return view('admin.ganti_pw');
});

Route::get('/detail_baku', function () {
    return view('admin.detail_baku');
});
Route::get('/riwayat_baku', function () {
    return view('admin.riwayat_baku');
});
Route::get('/laporan_keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan.keuangan');

Route::get('/riwayat_keuangan', function () {
    return view('admin.riwayat_keuangan');
});
Route::get('/detail_keuangan', function () {
    return view('admin.detail_keuangan');
});
Route::get('/kelola_informasi_salon', function () {
    return view('admin.kelola_informasi_salon');
});

Route::get('/profil', [ProfilController::class, 'profil'])->name('profil');
Route::put('/admin/profil/update', [ProfilController::class, 'update'])->name('admin.updateProfil');

Route::get('/ganti_pw', function () {
    return view('admin.ganti_pw');
});
});