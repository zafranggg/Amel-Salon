@extends('layout.app')
@section('title', 'Riwayat Layanan')

@section('content')
@section('nama')
    <h3 class="mt-4">Riwayat Layanan</h3>
@endsection

<div class="container-fluid p-4" style="background-color: #fdf1f4; border-radius: 12px;">
    <div class="mb-4">
        <h2 class="fw-bold text-center" style="color: #dc357d;">
            💇‍♀️ Riwayat Pelanggan Salon
        </h2>
    </div>

    <!-- Tabs -->
    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="riwayatTabs">
        <li class="nav-item">
            <a class="nav-link active" id="tabLangsung" href="#" onclick="showTab('langsung')">
                <i class="bi bi-credit-card tab-icon"></i> Pembayaran Langsung
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tabBooking" href="#" onclick="showTab('booking')">
                <i class="bi bi-calendar tab-icon"></i> Dari Booking
            </a>
        </li>
    </ul>


    <!-- Conditional Table -->
    <!-- Tabel Pembayaran Langsung -->
    <div id="contentLangsung" class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>👩 Nama Pelanggan</th>
                    <th>📱 No HP</th>
                    <th>💆‍♀️ Layanan</th>
                    <th>📅 Tanggal</th>
                    <th>💰 Total Bayar</th>
                    <th>🔍 Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksiLangsung as $i => $transaksi)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $transaksi->pelanggan?->nama_pelanggan ?? $transaksi->pelanggan_baru }}</td>
                        <td>{{ $transaksi->pelanggan?->no_hp ?? '-' }}</td>
                        <td>
                            {{ $transaksi->treatments->pluck('nama_treatment')->join(', ') }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d - m - Y') }}</td>
                        <td>Rp {{ number_format($transaksi->uang_dibayar, 0, ',', '.') }}</td>
                        <td>
                            <button class="btn btn-sm btn-detail" 
                                data-id="{{ $transaksi->booking->pelanggan->id ?? 'BARU' }}"
                                data-status="{{ $transaksi->booking ? 'Terdaftar' : 'Baru' }}"
                                data-nama="{{ $transaksi->booking->pelanggan->nama_pelanggan ?? $transaksi->pelanggan_baru }}"
                                data-hp="{{ $transaksi->booking->pelanggan->no_hp ?? '-' }}"
                                data-layanan= "{{ $transaksi->treatments->pluck('nama_treatment')->join(', ') }}"
                                data-tanggal="{{ $transaksi->tanggal_transaksi }}"
                                data-metode="{{ $transaksi->metode_pembayaran }}"
                                data-total="Rp {{ number_format($transaksi->uang_dibayar, 0, ',', '.') }}"
                                onclick="openDetailModal(this)">
                                Detail
                            </button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada booking menunggu konfirmasi</td>
                        </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <!-- Tabel Dari Booking -->
    <div id="contentBooking" class="table-responsive" style="display: none;">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>👩 Nama Pelanggan</th>
                    <th>📅 Jadwal Booking</th>
                    <th>📝 Layanan</th>
                    <th>📌 Status</th>
                    <th>💰 Total Bayar</th>
                    <th>🔍 Aksi</th>
                </tr>

            </thead>
            <tbody>
                @forelse ($transaksiBooking as $i => $transaksi)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $transaksi->booking->pelanggan->nama_pelanggan ?? $transaksi->pelanggan_baru }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaksi->booking->waktu)->format('Y-m-d') }}</td>
                        <td>{{ $transaksi->booking->treatments->pluck('nama_treatment')->join(' + ') }}</td>
                        <td>{{ ucfirst($transaksi->booking->status) }}</td>
                        <td>Rp {{ number_format($transaksi->uang_dibayar, 0, ',', '.') }}</td>
                        <td>
                            <button class="btn btn-sm btn-detail" 
                                data-id="{{ $transaksi->booking->pelanggan->id_pelanggan ?? 'BARU' }}"
                                data-status="{{ $transaksi->booking ? 'Terdaftar' : 'Baru' }}"
                                data-nama="{{ $transaksi->booking->pelanggan->nama_pelanggan ?? $transaksi->pelanggan_baru }}"
                                data-hp="{{ $transaksi->booking->pelanggan->no_hp ?? '-' }}"
                                data-layanan= "{{ $transaksi->treatments->pluck('nama_treatment')->join(', ') }}"
                                data-tanggal="{{ $transaksi->tanggal_transaksi }}"
                                data-metode="{{ $transaksi->metode_pembayaran }}"
                                data-total="Rp {{ number_format($transaksi->uang_dibayar, 0, ',', '.') }}"
                                onclick="openDetailModal(this)">
                                Detail
                            </button>

                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada booking menunggu konfirmasi</td>
                        </tr>
                @endforelse
            </tbody>

        </table>
    </div>


    <!-- Modal Detail -->
    <div class="modal" id="modalDetail">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4" style="border-radius: 15px;">
        <div class="modal-header" style="background-color: #ffe6f0;">
            <h5 class="modal-title text-danger fw-bold">🧾 Detail Pelanggan</h5>
            <button type="button" class="btn-close" onclick="closeModal()"></button>
        </div>
        <div class="modal-body" id="detailBody" style="font-size: 15px;">
            <!-- Diisi oleh JS -->
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-danger" onclick="closeModal()">Tutup</button>
        </div>
        </div>
    </div>
    </div>


<!-- Modal Script -->
<script>

    function closeModal() {
        document.getElementById("modalDetail").style.display = "none";
        document.getElementById("modalDetail2").style.display = "none";
    }

    window.onclick = function(event) {
        const modalDetail = document.getElementById("modalDetail");
        if (event.target === modalDetail) {
            modalDetail.style.display = "none";
        }
        const modalDetail2 = document.getElementById("modalDetail2");
        if (event.target === modalDetail2) {
            modalDetail.style.display = "none";
        }
    }
</script>
<script>
    function showTab(tab) {
        // Tab aktif
        document.getElementById('tabLangsung').classList.remove('active');
        document.getElementById('tabBooking').classList.remove('active');

        // Konten
        document.getElementById('contentLangsung').style.display = 'none';
        document.getElementById('contentBooking').style.display = 'none';

        if (tab === 'langsung') {
            document.getElementById('tabLangsung').classList.add('active');
            document.getElementById('contentLangsung').style.display = 'block';
        } else if (tab === 'booking') {
            document.getElementById('tabBooking').classList.add('active');
            document.getElementById('contentBooking').style.display = 'block';
        }
    }
    // Tampilkan tab 'langsung' secara default saat halaman dimuat
        window.onload = function() {
            showTab('langsung');
        };
</script>
<script>
  function openDetailModal(button) {
    const body = document.getElementById('detailBody');
    body.innerHTML = `
      <p>🆔 <strong>ID Pelanggan:</strong> ${button.dataset.id}</p>
      <p>🛡️ <strong>Status:</strong> ${button.dataset.status}</p>
      <p>🙋‍♀️ <strong>Nama:</strong> ${button.dataset.nama}</p>
      <p>📱 <strong>No. HP:</strong> ${button.dataset.hp}</p>
      <p>💆‍♀️ <strong>Layanan:</strong> ${button.dataset.layanan}</p>
      <p>📅 <strong>Tanggal:</strong> ${button.dataset.tanggal}</p>
      <p>💳 <strong>Metode Pembayaran:</strong> ${button.dataset.metode}</p>
      <p>💰 <strong>Total Bayar:</strong> <span style="color: red;">${button.dataset.total}</span></p>
    `;
    document.getElementById('modalDetail').style.display = 'block';
    document.getElementById('modalDetail').classList.add('show');
  }

  function closeModal() {
    document.getElementById('modalDetail').classList.remove('show');
    document.getElementById('modalDetail').style.display = 'none';
  }
</script>

@endsection
