<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pelanggan;
use App\Models\Admin;

class DaftarController extends Controller
{
    public function showRegistrationForm()
    {
        return view('daftar');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email'          => 'required|email|unique:pelanggan,email',
            'password'       => 'required|min:6',
            'no_hp'          => 'nullable',
        ]);
        Pelanggan::create([
            'nama_pelanggan' => $request->nama,
            'email'          => $request->email,
            'password'       => $request->password, 
            'role'           => 'pelanggan',
            'no_hp'          => $request->no_hp,
            'dibuat_pada'    => now()->format('Y-m-d'),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }


    public function showRegistrationAdminForm()
    {
        return view('daftar_admin');
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'nama'           => 'required',
            'email'          => 'required|email|unique:pelanggan,email',
            'password'       => 'required|min:6',
            'no_hp'          => 'nullable',
        ]);
        Admin::create([
            'nama_admin'     => $request->nama,
            'email'          => $request->email,
            'password'       => $request->password, 
            'role'           => 'admin',
            'dibuat_pada'    => now()->format('Y-m-d'),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

}
