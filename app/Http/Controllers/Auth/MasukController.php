<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\Customer;

class MasukController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
                // Coba login sebagai admin
        $admin = Admin::where('email', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('web')->login($admin); // gunakan guard yang sesuai config auth.php
            session([
                'logged_in_user' => $admin->id_admin,
                'role' => 'admin',
                'nama' => $admin->nama_admin,
            ]);

            return redirect()->route('dashboard');
        }

        // Coba login sebagai pelanggan
        $pelanggan = Pelanggan::where('email', $credentials['email'])->first();
        if ($pelanggan && Hash::check($credentials['password'], $pelanggan->password)) {
            Auth::guard('pelanggan')->login($pelanggan); // gunakan guard pelanggan

            session([
                'logged_in_user' => $pelanggan->id_pelanggan,
                'role' => 'pelanggan',
                'nama' => $pelanggan->nama_pelanggan,
            ]);
            
            return redirect()->route('pelanggan.riwayat');
        }
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
