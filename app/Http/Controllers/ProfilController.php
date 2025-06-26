<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class ProfilController extends Controller
{
    
    public function profil()
    {
        
        // Ambil admin berdasarkan ID yang sedang login
        $adminId = session('logged_in_user');
        $admin = Admin::find($adminId);

        if (!$admin) {
            return redirect()->back()->with('error', 'Admin tidak ditemukan.');
        }

        return view('admin.profil', compact('admin'));
    }

    public function update(Request $request)
    {
        $adminId = session('logged_in_user');
        $admin = Admin::find($adminId);

        if (!$admin) {
            return redirect()->back()->with('error', 'Admin tidak ditemukan.');
        }

        $request->validate([
            'nama_admin' => 'required|string|max:100',
            'email' => 'required|email',
            'no_hp' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($admin->foto) {
                Storage::disk('public')->delete('foto_admin/' . $admin->foto);
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('foto_admin', $namaFile, 'public');
            $admin->foto = $namaFile;
        }

        $admin->nama_admin = $request->nama_admin;
        $admin->email = $request->email;
        $admin->no_hp = $request->no_hp;
        $admin->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
