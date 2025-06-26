<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function Create()
{
    $pelanggans = Pelanggan::all();
    return view('admin.data_pelanggan', compact('pelanggans'));
}

   public function detail($id)
{
    $pelanggan = Pelanggan::with(['bookings.treatments']) // jika ingin data lengkap
        ->findOrFail($id);

    return view('admin.detail_pelanggan', compact('pelanggan'));
}

public function destroy($id)
{
    $pelanggan = Pelanggan::findOrFail($id);

    // Jika ingin menghapus relasi bookings juga:
    // $pelanggan->bookings()->delete();

    $pelanggan->delete();

    return redirect()->route('pelanggan.create')->with('success', 'Pelanggan berhasil dihapus.');
}

public function store(Request $request)
{
    $request->validate([
        'nama_pelanggan' => 'required|string|max:100',
        'email' => 'required|email|unique:pelanggan,email',
        'username' => 'required|string|unique:pelanggan,username',
        'dibuat' => 'required|date',
        'no_hp' => 'required|string|max:20',
        'password' => 'required|confirmed|min:6',
    ]);

    Pelanggan::create([
        'nama_pelanggan' => $request->nama_pelanggan,
        'email' => $request->email,
        'username' => $request->username,
        'dibuat_pada' => $request->dibuat,
        'no_hp' => $request->no_hp,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('pelanggan.create')->with('success', 'Pelanggan berhasil ditambahkan.');
}

}
