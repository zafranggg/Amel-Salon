<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    public function index()
    {
        $pelangganId = session('logged_in_user');

        if (!$pelangganId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $transaksi = Transaksi::with('treatments') // jika relasi treatment ada
                    ->where('id_pelanggan', $pelangganId)
                    ->orderBy('tanggal_transaksi', 'desc')
                    ->get();

        return view('pelanggan.transaksi_pembayaran', compact('transaksi'));
    }

    public function showDetail($id)
{
    $transaksi = \App\Models\Transaksi::with('treatments')->find($id);

    if (!$transaksi) {
        return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
    }

    // Ambil nama pelanggan
    $nama = $transaksi->pelanggan->nama_pelanggan ?? $transaksi->pelanggan_baru;

    return response()->json([
        'nama_pelanggan' => $nama,
        'tanggal' => $transaksi->tanggal_transaksi,
        'metode' => $transaksi->metode_pembayaran,
        'total' => $transaksi->total_pembayaran,
        'uang_dibayar' => $transaksi->uang_dibayar,
        'kembalian' => $transaksi->uang_dibayar - $transaksi->total_pembayaran,
        'treatments' => $transaksi->treatments->map(function ($t) {
            return [
                'nama' => $t->nama_treatment,
                'harga' => $t->harga
            ];
        })
    ]);
}

public function cetakStruk($id)
    {
        $transaksi = Transaksi::with(['treatments', 'pelanggan'])->findOrFail($id);
        $pdf = Pdf::loadView('transaksi.struk_pdf', compact('transaksi'));

        return $pdf->stream('struk_transaksi_'.$id.'.pdf');
    }
}
