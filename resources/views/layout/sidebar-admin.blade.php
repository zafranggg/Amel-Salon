<style>
/* Kecilkan sidebar */
#sidebar.sidebar-collapsed {
  width: 70px !important;
  overflow-x: hidden;
}

/* Sembunyikan teks label */
#sidebar.sidebar-collapsed .link-text {
  display: none;
}

/* Sidebar tampak tetap bagus */
#sidebar .nav-link {
  display: flex;
  align-items: left;
  gap: 10px;
}
</style>
<div class="brand d-flex justify-content-between align-items-center mb-3">
  <span class="fw-bold"><span class="link-text text-pink">Amel</span> <span class="link-text text-dark">Salon</span></span>
  <button id="toggleSidebar" class="btn btn-sm btn-outline-secondary">
    <i class="bi bi-list"></i>
  </button>
</div>

    <nav class="nav flex-column">
    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
      <i class="bi bi-house-door"></i><span class="link-text">Beranda</span>
    </a>
    <a class="nav-link {{ request()->is('data_pelanggan') || request()->is('detail_pelanggan') ? 'active' : '' }}" href="{{ url('/data_pelanggan') }}">
      <i class="bi bi-people"></i><span class="link-text">Data Pelanggan</span>
    </a>
    <a class="nav-link {{ request()->is('riwayat_layanan') || request()->is('selengkap_riwayat_tr') || request()->is('riwayat_booking') || request()->is('selengkap_riwayat_bk') ? 'active' : '' }}" href="/riwayat_layanan">
      <i class="bi bi-clock-history"></i><span class="link-text">Riwayat Layanan</span>
    </a>
    <a class="nav-link {{ request()->is('jadwal_treatment') ? 'active' : '' }}" href="{{ url('/jadwal_treatment') }}">
      <i class="bi bi-calendar-check"></i><span class="link-text">Jadwal Treatment</span>
    </a>
    <a class="nav-link {{ request()->is('treatment') ? 'active' : '' }}" href="{{ route('treatment.index') }}">
      <i class="bi bi-scissors"></i><span class="link-text">Treatment Salon</span>
    </a>
    </a>
    <a class="nav-link {{ request()->is('transaksi_pembayaran') || request()->is('daribooking') || request()->is('menunggu_jadwal') || request()->is('menunggu_konfirmasi') || request()->is('edit_booking') ? 'active' : '' }}" href="/transaksi_pembayaran">
      <i class="bi bi-credit-card"></i><span class="link-text">Transaksi dan Booking</span>
    </a>
    <a class="nav-link {{ request()->is('bahan_baku') || request()->is('detail_baku') || request()->is('riwayat_baku') ? 'active' : '' }}" href="{{ url('/bahan_baku') }}">
      <i class="bi bi-box-seam"></i><span class="link-text">Bahan Baku</span>
    </a>
    <a class="nav-link {{ request()->is('laporan_keuangan') || request()->is('detail_keuangan') || request()->is('riwayat_keuangan') ? 'active' : '' }}" href="/laporan_keuangan">
      <i class="bi bi-bar-chart-line"></i><span class="link-text">Laporan Keuangan</span>
    </a>
    <!--<a class="nav-link {{ request()->is('kelola_informasi_salon') ? 'active' : '' }}" href="/kelola_informasi_salon">
      <i class="bi bi-info-circle"></i><span>Kelola Informasi Salon</span>
    </a>-->
        </nav>

        <hr/>
        <div class="footer-links">
          {{-- <a href="#"><span><i class="bi bi-gear"></i>Pengaturan </span></a> --}}
          <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="/profil"><i class="bi bi-person"></i><span class="link-text">Profil</span></a>
          {{-- <a class="nav-link {{ request()->is('ganti_pw') ? 'active' : '' }}" href="/ganti_pw"><i class="bi bi-lock"></i>Update Password</a> --}}
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class=" btn btn-link text-danger p-0 m-0 align-baseline">
                  <i class="bi bi-box-arrow-right"></i> <span class="link-text">Logout</span>
              </button>
          </form>
        </div>
      </div>


