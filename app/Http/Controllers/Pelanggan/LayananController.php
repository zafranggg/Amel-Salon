<?php

namespace App\Http\Controllers\Pelanggan;

use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    public function riwayat()
    {
        $user = Auth::guard('pelanggan')->user();

        // Transaksi langsung (tanpa booking)
        $transaksiLangsung = Transaksi::whereNull('id_booking')
            ->where('id_pelanggan', $user->id)
            ->with('treatments')
            ->get();

        // Transaksi dari booking
        $transaksiBooking = Transaksi::whereNotNull('id_booking')
            ->whereHas('booking', fn($q) => $q->where('id_pelanggan', Auth::id()))
            ->with('booking.treatments')
            ->get();
        return view('pelanggan.riwayat_layanan', compact('transaksiLangsung', 'transaksiBooking'));
    }
}
