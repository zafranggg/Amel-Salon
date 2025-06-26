<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function profil()
    {
        $pelangganId = session('logged_in_user');
        $pelanggan = Pelanggan::find($pelangganId);

        if (!$pelanggan) {
            return redirect()->back()->with('error', 'Pelanggan tidak ditemukan.');
        }

        return view('pelanggan.profil', compact('pelanggan'));
    }

    public function update(Request $request)
    {
        $pelangganId = session('logged_in_user');
        $pelanggan = Pelanggan::find($pelangganId);

        if (!$pelanggan) {
            return redirect()->back()->with('error', 'Pelanggan tidak ditemukan.');
        }

        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($pelanggan->foto) {
                Storage::disk('public')->delete('foto_pelanggan/' . $pelanggan->foto);
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('foto_pelanggan', $namaFile, 'public');
            $pelanggan->foto = $namaFile;
        }

        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->email = $request->email;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
