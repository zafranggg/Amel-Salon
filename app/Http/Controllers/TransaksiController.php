<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use App\Models\Treatment;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\User;

class TransaksiController extends Controller
{
    public function create()
    {
   
        $treatments = Treatment::all();
        $pelanggan = Pelanggan::all();
        $transaksi = Transaksi::orderBy('tanggal_transaksi', 'desc')->get();
        return view('admin.transaksi_pembayaran', compact('pelanggan', 'transaksi', 'treatments'));
    }

   public function store(Request $request)
{
    // 1. Validasi masukan
    $request->validate([
        'nama_pelanggan'       => 'required|string',
        'pelanggan_baru'       => 'nullable|boolean',
        'tanggal'              => 'required|date',
        'metode_pembayaran'    => 'required|in:cash,transfer,qris',
        'total_pembayaran'     => 'required|numeric|min:0',
        'uang_dibayar'         => 'required|numeric|min:0|gte:total_pembayaran',
        'treatments'           => 'required|array|min:1',
        'treatments.*.id_treatment' => 'required|exists:treatment,id_treatment',
        'treatments.*.harga'   => 'required|numeric|min:0',
    ]);

    // 2. Persiapkan data header transaksi
    $totalHarga  = $request->total_pembayaran;
    $uangDibayar = $request->uang_dibayar;
    $kembalian   = $ $totalHarga - $uangDibayar;

    // 3. Tentukan id pelanggan (atau null jika baru)
    if ($request->pelanggan_baru) {
        $idPelanggan   = null;
        $namaPelanggan = $request->nama_pelanggan;
    } else {
        $pelanggan = Pelanggan::where('nama_pelanggan', $request->nama_pelanggan)->first();
        if (! $pelanggan) {
            return back()->with('error', 'Pelanggan tidak ditemukan.');
        }
        $idPelanggan   = $pelanggan->id_pelanggan;
        $namaPelanggan = null;
    }

    // 4. Simpan header transaksi
    $transaksi = Transaksi::create([
        'id_pelanggan'     => $idPelanggan,
        'pelanggan_baru'   => $namaPelanggan,
        'tanggal_transaksi'=> $request->tanggal,
        'metode_pembayaran'=> $request->metode_pembayaran,
        'total_pembayaran' => $totalHarga,
        'uang_dibayar'     => $uangDibayar,
        'kembalian'        => $kembalian,
    ]);

    // 5. Sync ke pivot transaksi_treatment
    //    Format: [ id_treatment => ['harga' => ...], ... ]
    $syncData = [];
    foreach ($request->treatments as $t) {
        $syncData[ $t['id_treatment'] ] = ['harga' => $t['harga']];
    }
    $transaksi->treatments()->sync($syncData);

    return redirect()->route('transaksi.create')->with('success', 'Transaksi berhasil disimpan');
}


public function getDetail($id)
{
    $dettransaksi = Transaksi::with(['treatments', 'pelanggan'])
                   ->find($id);

    if (! $dettransaksi) {
        return response()->json(['error'=>'Tidak ditemukan'],404);
    }

    // Bangun array treatments dari pivot
    $list = $dettransaksi->treatments->map(function($t){
        return [
            'nama' => $t->nama_treatment,
            'harga'=> $t->pivot->harga,
        ];
    })->all();

    return response()->json([
        'id'            => $dettransaksi->id_transaksi,
        'nama_pelanggan'=> $dettransaksi->pelanggan->nama_pelanggan ?? $dettransaksi->pelanggan_baru,
        'tanggal'       => $dettransaksi->tanggal_transaksi,
        'metode'        => $dettransaksi->metode_pembayaran,
        'total'         => $dettransaksi->total_pembayaran,
        'uang_dibayar'  => $dettransaksi->uang_dibayar,
        'kembalian'     => $dettransaksi->kembalian,
        'treatments'    => $list,
    ]);
}

    public function cetakStruk($id)
    {
        $transaksi = Transaksi::with(['treatments', 'pelanggan'])->findOrFail($id);
        $pdf = Pdf::loadView('transaksi.struk_pdf', compact('transaksi'));

        return $pdf->stream('struk_transaksi_'.$id.'.pdf');
    }
}
