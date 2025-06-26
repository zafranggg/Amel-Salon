<!-- Tabs -->
        <ul class="nav nav-tabs mb-3">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('transaksi_pembayaran') ? 'active' : '' }}" href="{{ url('/transaksi_pembayaran') }}"><i class="bi bi-credit-card tab-icon"></i>Daftar Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('daribooking') ? 'active' : '' }}" href="{{ url('/daribooking') }}"><i class="bi bi-calendar tab-icon"></i>Dari Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('menunggu_jadwal') ? 'active' : '' }}" href="{{ url('/menunggu_jadwal') }}"><i class="bi bi-clock tab-icon"></i>Menunggu Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('menunggu_konfirmasi') ? 'active' : '' }}" href="{{ url('/menunggu_konfirmasi') }}"><i class="bi bi-person-check tab-icon"></i>Menunggu Konfirmasi</a>
          </li>
        </ul>