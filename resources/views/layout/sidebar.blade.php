<div class="col-md-2 sidebar">
        <div class="brand">Amel <strong style="color: rgb(0, 0, 0)">Salon</strong></div>
        <nav class="nav flex-column">
  <a class="nav-link {{ request()->is('beranda') ? 'active' : '' }}" href="{{ url('/beranda') }}">Beranda</a>
  {{-- <a class="nav-link {{ request()->is('data_pelanggan') ? 'active' : '' }}" href="{{ url('/data_pelanggan') }}">Data Pelanggan</a> --}}
  <a class="nav-link {{ request()->is('data_pelanggan') || request()->is('detail_pelanggan') ? 'active' : '' }}" href="{{ url('/data_pelanggan') }}">Data Pelanggan</a>
  <a class="nav-link {{ request()->is('riwayat_layanan') || request()->is('selengkap_riwayat_tr') || request()->is('riwayat_booking') || request()->is('selengkap_riwayat_bk') ? 'active' : '' }}" href="/riwayat_layanan">Riwayat Layanan</a>
  <a class="nav-link {{ request()->is('jadwal_treatment') ? 'active' : '' }}" href="/jadwal_treatment">Jadwal Treatment</a>
  <a class="nav-link {{ request()->is('treatment_salon') ? 'active' : '' }}" href="/treatment_salon">Treatment Salon</a>
  <a class="nav-link {{ request()->is('transaksi_pembayaran') ? 'active' : '' }}" href="/transaksi_pembayaran">Transaksi Pembayaran</a>
  <a class="nav-link {{ request()->is('bahan_baku') ? 'active' : '' }}" href="/bahan_baku">Bahan Baku</a>
  <a class="nav-link {{ request()->is('laporan_keuangan') ? 'active' : '' }}" href="/laporan_keuangan">Laporan Keuangan</a>
  <a class="nav-link {{ request()->is('kelola_informasi_salon') ? 'active' : '' }}" href="/kelola_informasi_salon">Kelola Informasi Salon</a>
</nav>

        <hr />
        <div class="footer-links">
          <a href="#"><i class="bi bi-gear"></i>Pengaturan</a>
          <a href="#"><i class="bi bi-person"></i>Profil</a>
          <a href="#"><i class="bi bi-lock"></i>Update Password</a>
          <a href="#" class="text-danger"><i class="bi bi-box-arrow-right"></i>Logout</a>
        </div>
      </div>