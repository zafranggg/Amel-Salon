<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanBaku;

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahanList = BahanBaku::all();
        return view('admin.bahan_baku', compact('bahanList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:100',
            'jumlah_awal' => 'required|numeric|min:0',
            'minimum_stok' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('bahan', 'public');
        }

        BahanBaku::create([
            'nama_bahan' => $request->nama_bahan,
            'jumlah' => $request->jumlah_awal,
            'minimum_stok' => $request->minimum_stok,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('bahan.index')->with('success', 'Bahan baku berhasil ditambahkan.');
    }

    public function tambahStok(Request $request)
    {
        $request->validate([
            'id_bahan' => 'required|exists:bahan_bakus,id',
            'jumlah' => 'required|numeric|min:1'
        ]);

        $bahan = BahanBaku::findOrFail($request->id_bahan);
        $bahan->jumlah += $request->jumlah;
        $bahan->save();

        return back()->with('success', 'Stok berhasil ditambahkan.');
    }

    public function pakaiStok(Request $request)
    {
        $request->validate([
            'id_bahan' => 'required|exists:bahan_bakus,id',
            'jumlah' => 'required|numeric|min:1'
        ]);

        $bahan = BahanBaku::findOrFail($request->id_bahan);
        if ($bahan->jumlah < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi.');
        }
        $bahan->jumlah -= $request->jumlah;
        $bahan->save();

        return back()->with('success', 'Stok berhasil dikurangi.');
    }
}
