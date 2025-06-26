@extends('layout.app')
@section('title', 'Ganti Password')
@section('content')

<div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
    
    <!-- Logo -->
    <img src="/assets/salon.png" alt="Logo Amel Beauty" style="max-width: 120px; margin-bottom: 20px;">

    <!-- Card Ganti Password -->
    <div class="shadow p-4" style="width: 400px; background-color: white; border-radius: 10px; border-top: 3px solid #e91e63;">
        <h4 class="text-center mb-4" style="color: #e91e63;">
            <i class="bi bi-lock-fill"></i> Ganti Password Admin
        </h4>

        <form method="POST" action="#">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label text-primary">Password Lama</label>
                <input type="password" name="current_password" class="form-control" placeholder="Masukkan password lama" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-primary">Password Baru</label>
                <input type="password" name="new_password" class="form-control" placeholder="Password baru" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-primary">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" class="form-control" placeholder="Ulangi password baru" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn" style="background-color: #e91e63; color: white;">
                    <i class="bi bi-save-fill"></i> Simpan Password
                </button>
                <a href="{{ url('/profil') }}" class="btn btn-dark">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <p class="mt-4 text-muted text-center" style="font-size: 14px;">
        © 2025 Amel Beauty Salon. Hak Cipta Dilindungi
    </p>
</div>

@endsection
