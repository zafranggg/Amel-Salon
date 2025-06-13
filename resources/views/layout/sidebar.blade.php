<div id="sidebar" class="col-md-2 sidebar">
  <div class="brand">Amel <strong style="color: rgb(0, 0, 0)">Salon</strong>
    <button id="toggleSidebar" class="btn btn-outline-secondary m-2">
      <i class="bi bi-list"></i>
    </button>
  </div>
        <nav class="nav flex-column">
    <a class="nav-link {{ request()->is('beranda') ? 'active' : '' }}" href="{{ url('/beranda') }}">
      <i class="bi bi-house-door"></i><span>Beranda</span>
    </a>
    <a class="nav-link {{ request()->is('data_pelanggan') || request()->is('detail_pelanggan') ? 'active' : '' }}" href="{{ url('/data_pelanggan') }}">
      <i class="bi bi-people"></i><span>Data Pelanggan</span>
    </a>
    <a class="nav-link {{ request()->is('riwayat_layanan') || request()->is('selengkap_riwayat_tr') || request()->is('riwayat_booking') || request()->is('selengkap_riwayat_bk') ? 'active' : '' }}" href="/riwayat_layanan">
      <i class="bi bi-clock-history"></i><span>Riwayat Layanan</span>
    </a>
    <a class="nav-link {{ request()->is('jadwal_treatment') ? 'active' : '' }}" href="{{ url('/jadwal_treatment') }}">
      <i class="bi bi-calendar-check"></i><span>Jadwal Treatment</span>
    </a>
    <a class="nav-link {{ request()->is('treatment_salon') ? 'active' : '' }}" href="/treatment_salon">
      <i class="bi bi-scissors"></i><span>Treatment Salon</span>
    </a>
    <a class="nav-link {{ request()->is('transaksi_pembayaran') || request()->is('daribooking') || request()->is('menunggu_jadwal') || request()->is('menunggu_konfirmasi') || request()->is('edit_booking') ? 'active' : '' }}" href="/transaksi_pembayaran">
      <i class="bi bi-credit-card"></i><span>Transaksi Pembayaran</span>
    </a>
    <a class="nav-link {{ request()->is('bahan_baku') || request()->is('detail_baku') || request()->is('riwayat_baku') ? 'active' : '' }}" href="{{ url('/bahan_baku') }}">
      <i class="bi bi-box-seam"></i><span>Bahan Baku</span>
    </a>
    <a class="nav-link {{ request()->is('laporan_keuangan') || request()->is('detail_keuangan') || request()->is('riwayat_keuangan') ? 'active' : '' }}" href="/laporan_keuangan">
      <i class="bi bi-bar-chart-line"></i><span>Laporan Keuangan</span>
    </a>
    <a class="nav-link {{ request()->is('kelola_informasi_salon') ? 'active' : '' }}" href="/kelola_informasi_salon">
      <span><i class="bi bi-info-circle"></i>Kelola Informasi Salon</span>
    </a>
        </nav>

        <hr/>
        <div class="footer-links">
          <a href="#"><span><i class="bi bi-gear"></i>Pengaturan </span></a>
          <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="/profil"><i class="bi bi-person"></i>Profil</a>
          <a class="nav-link {{ request()->is('ganti_pw') ? 'active' : '' }}" href="/ganti_pw"><i class="bi bi-lock"></i>Update Password</a>
          <a href="/login" class="text-danger"><i class="bi bi-box-arrow-right"></i>Logout</a>
        </div>
      </div>