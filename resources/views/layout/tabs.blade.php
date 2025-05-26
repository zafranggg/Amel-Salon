 <!-- Tabs -->
        <ul class="nav nav-tabs mb-3">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('transaksi_pembayaran') ? 'active' : '' }}" href="{{ url('/transaksi_pembayaran') }}"><i class="bi bi-credit-card tab-icon"></i>Pembayaran Langsung</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('daribooking') ? 'active' : '' }}" href="{{ url('/daribooking') }}"><i class="bi bi-calendar tab-icon"></i>Dari Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="MenungguJadwal.html"><i class="bi bi-clock tab-icon"></i>Menunggu Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="MenungguKonfirmasi.html"><i class="bi bi-person-check tab-icon"></i>Menunggu Konfirmasi</a>
          </li>
        </ul>