<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use App\Models\Booking;
use App\Models\BahanBaku;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    
public function index()
{
    $totalPelanggan = Pelanggan::count();
    $bookingHariIni = Booking::whereDate('tanggal_booking', Carbon::today())->count();
    $stokHampirHabis = '-';
    // BahanBaku::where('stok', '<', 5)->count();
    $pemasukanBulanIni = DB::table('transaksi')
    ->whereMonth('tanggal_transaksi', Carbon::now()->month)
    ->whereYear('tanggal_transaksi', Carbon::now()->year)
    ->selectRaw('SUM(uang_dibayar - kembalian) as total')
    ->value('total');
    return view('admin.beranda', compact(
        'totalPelanggan',
        'bookingHariIni',
        'stokHampirHabis',
        'pemasukanBulanIni'
    ));
}

}
