<?php

namespace App\Http\Controllers;


use App\Models\Transaksi;
use App\Models\Booking;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LayananController extends Controller
{
    public function daftarLayanan()
{
    $transaksis = Transaksi::with(['treatments'])->get();

    // Ambil transaksi langsung (bukan dari booking)
    $transaksiLangsung = Transaksi::whereNull('id_booking')->with('pelanggan', 'treatments')->get();

    // Ambil transaksi dari booking
    $transaksiBooking = Transaksi::whereNotNull('id_booking')->with('booking.pelanggan', 'booking.treatments')->get();

    return view('admin.riwayat_layanan', compact('transaksiLangsung', 'transaksiBooking'));
}


}
