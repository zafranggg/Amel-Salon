@extends('layout.app')

@section('title', 'Beranda')

@section('nama')
    <h3 class="mt-4">Beranda</h3>
@endsection

@section('content')
<div class="px-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="welcome-text mb-4 fs-4 fw-bold text-pink">
        👋 Hallo, {{ Auth::user()->nama_pelanggan }}!
    </div>

    <div class="row g-4">
        <!-- Card 1: Booking Cepat -->
        <div class="col-md-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <i class="bi bi-calendar-check fs-1 text-pink"></i>
                    <h5 class="card-title mt-3">Buat Booking</h5>
                    <p class="card-text">Pesan treatment favoritmu sekarang juga!</p>
                    <a href="{{ route('booking.create') }}" class="btn btn-pink">Booking Sekarang</a>
                </div>
            </div>
        </div>

        <!-- Card 2: Lihat Riwayat -->
        <div class="col-md-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <i class="bi bi-clock-history fs-1 text-warning"></i>
                    <h5 class="card-title mt-3">Riwayat Booking</h5>
                    <p class="card-text">Lihat daftar semua booking yang telah kamu lakukan.</p>
                    <a href="{{ route('pelanggan.riwayat') }}" class="btn btn-pink">Lihat Riwayat</a>
                </div>
            </div>
        </div>

        <!-- Card 3: Promo Terbaru -->
        <div class="col-md-4">
            <div class="card text-center shadow border-0">
                <div class="card-body">
                    <i class="bi bi-tags fs-1 text-danger"></i>
                    <h5 class="card-title mt-3">Promo Terbaru</h5>
                    <p class="card-text">Dapatkan diskon spesial untuk layanan pilihan!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="text-pink fw-bold mb-3">⭐ Treatment Favorit Pelanggan</h4>
        <div class="row g-3">
            @forelse ($treatmentFavorit as $treatment)
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center">
                        <img src="{{ asset('assets\salon.png') }}" class="card-img-top p-3" alt="Treatment"
                            style="height: 180px; object-fit: contain;">
                        <div class="card-body">
                            <h6 class="card-title fw-bold">{{ $treatment->nama }}</h6>
                            <p class="card-text text-muted">Dipilih {{ $treatment->total }}x</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted text-center">Belum ada treatment favorit.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection