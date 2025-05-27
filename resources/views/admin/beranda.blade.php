@extends('layout.app')
@section('title', 'Beranda')
@section('content')
        <div class="px-4">
          <h1 class="section-title">Beranda</h1>
          <div class="welcome-text mb-4">👋 Selamat Datang, Admin!</div>

          <div class="row g-3 mt-3">
            <div class="col-md-4">
              <div class="dashboard-card">
                <h6>Total Pelanggan</h6>
                <span class="icon">👥</span>
                <p>300</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="dashboard-card">
                <h6>Booking Hari Ini</h6>
                <span class="icon">📅</span>
                <p>5</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="dashboard-card">
                <h6>Stok Hampir Habis</h6>
                <span class="icon">⚠️</span>
                <p>3</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="dashboard-card">
                <h6>Pemasukan Bulan Ini</h6>
                <span class="icon">💰</span>
                <p>1,200</p>
              </div>
            </div>
          </div>

          <div class="reminder-box mt-4">
            <h6>🔔 Pengingat Hari Ini</h6>
            <ul>
              <li>Cek stok shampoo dan masker wajah.</li>
              <li>Konfirmasi ulang booking jam 14.00 dan 16.00.</li>
              <li>Update laporan keuangan mingguan.</li>
            </ul>
          </div>
        </div>
@endsection
    
