<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use App\Models\Pengeluaran;

class LaporanKeuanganController extends Controller
{
    public function index()
{
    // Ambil semua transaksi uang masuk
    $uangMasuk = Transaksi::all();
    $totalMasuk = DB::table('transaksi')
    ->selectRaw('SUM(uang_dibayar - kembalian) as total')
    ->value('total');

    // Ambil semua pengeluaran
     $uangKeluar = 0;
    //  Pengeluaran::all(); // jika ada model pengeluaran
    // $totalKeluar = $uangKeluar->sum('jumlah');
    
    $totalKeluar = 0;

    // Hitung saldo bersih
    $saldoBersih = $totalMasuk - $totalKeluar;

    return view('admin.laporan_keuangan', compact(
         'uangMasuk', 'uangKeluar', 'totalMasuk', 'totalKeluar', 'saldoBersih'
    ));
}

}
