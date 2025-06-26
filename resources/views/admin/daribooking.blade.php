@extends('layout.app')
@section('title', 'Tranksaksi pembayaran')
@section('style')
    <style>
        .modal {
  display: none;
  position: fixed;
  z-index: 999;
  /* padding-top: 50px; */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
  animation: fadeIn 0.3s ease forwards;
    }

    .modal-content {
  background-color: #fff;
  margin: auto;
  padding: 20px;
  border-radius: 15px;
  width: 50%;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  font-family: Arial, sans-serif;
  animation: slideIn 0.4s ease;
    }
    /* Animations */
  @keyframes fadeIn {
    from { opacity: 0; } to { opacity: 1; }
  }

  @keyframes slideIn {
    from { transform: translateY(-50px); opacity: 0; }
    to   { transform: translateY(0); opacity: 1; }
  }

  /* Responsive */
  @media (max-width: 600px) {
    .modal-content {
      width: 90%;
      margin: 10% auto;
      padding: 15px;
    }

    .actions {
      flex-direction: column;
      align-items: stretch;
    }
  }

    .close {
  color: #aaa;
  float: right;
  font-size: 28px;
  cursor: pointer;
    }

    .close:hover {
  color: black;
    }

    .section {
  padding: 10px 20px;
  border-radius: 10px;
  margin-bottom: 15px;
    }

    .purple { background: #e7e3fb; }
    .pink   { background: #fde7e7; }
    .blue   { background: #e0ecf8; }
    .green  { background: #e0f6e7; }

    .badge.waiting {
  background-color: #ffc107;
  color: #000;
  padding: 5px 10px;
  border-radius: 10px;
    }

    .price-due {
  color: red;
  font-weight: bold;
    }
    .actions {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
  gap: 10px; /* Tambahan opsional untuk jarak antar tombol */
    }

    .actions .btn {
  flex: 1; /* Bagi rata */
  padding: 12px;
  font-size: 16px;
  font-weight: bold;
    }

    .btn.green  { background-color: #28a745; }
    .btn.red    { background-color: #dc3545; }
    .btn.blue   { background-color: #007bff; }
    .btn.grey   { background-color: #6c757d; }

    </style>
@endsection
@section('content')
@section('nama')
        <h3 class="mt-4">Daftar Booking </h3>
        
@endsection
    
    <!-- Main content -->
      <div class="card-info">
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
        <h5 class="text-center text-danger fw-bold">Daftar Booking Yang Masuk</h5>
        <p class="text-center">Lihat seluruh booking yang masuk.</p>

        <!-- Total Lunas
        <div class="card-purple mb-3 d-flex justify-content-between align-items-center">
          <div><i class="bi bi-cash-coin"></i> <strong>Total Pembayaran Lunas :</strong></div>
          <h5 class="text-end text-primary mb-0">Rp 1.300.000</h5>
        </div>   -->

        <!-- Tabs -->
       @include('layout.tabs')

        <!-- Total Pembayaran dari Booking
        <div class="card-purple mb-3 p-3 d-flex justify-content-between align-items-center"
         style="background-color: rgba(13, 110, 253, 0.5);">
          <div><i class="bi bi-cash-coin"></i> <strong>Total Pembayaran Dari Booking (Lunas) :</strong></div>
          <h5 class="text-end  mb-0">Rp 1.300.000</h5>
        </div>  -->

        <!-- Table dari Booking  -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Metode</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $i => $booking)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $booking->pelanggan->nama_pelanggan ?? $booking->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d - m - Y') }}</td>
                            <td>{{ ucfirst($booking->metode_pembayaran) }}</td>
                            <td>Rp {{ number_format($booking->total_bayar, 0, ',', '.') }}</td>
                            <td><span class="text-warning">{{ $booking->status }}</span></td>
                            <td>
                              <div class="d-flex gap-2">
                                <!-- Tombol Detail -->
                                <button type="button" class="btn btn-sm btn-info" onclick="openDetailModal({{ $booking->id_booking }})">
                                  Detail
                                </button>

                                <!-- Tombol Konfirmasi -->
                                <form method="POST" action="{{ route('booking.diterima', $booking->id_booking) }}">
                                  @csrf
                                  <input type="hidden" name="aksi" value="konfirmasi">
                                  <button type="submit" class="btn btn-sm btn-success">Konfirmasi</button>
                                </form>
                              </div>
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

@foreach ($bookings as $booking)
<!-- Modal Detail Booking -->
<div id="modalDetail{{ $booking->id_booking }}" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeDetailModal({{ $booking->id_booking }})">&times;</span>
    <h2>🔍 Detail Booking - {{ $booking->treatments->pluck('nama_treatment')->implode(', ') }}</h2>

    <div class="section purple">
      <h3>📋 Data Pelanggan</h3>
      <p><strong>Nama Pelanggan:</strong> {{ $booking->pelanggan->nama_pelanggan ?? $booking->nama }}</p>
      <p><strong>No. HP:</strong> {{ $booking->pelanggan->no_hp ?? '-' }}</p>
      <p><strong>Jenis Pelanggan:</strong> {{ $booking->pelanggan ? 'Terdaftar' : 'Tidak Terdaftar' }}</p>
    </div>

    <div class="section pink">
      <h3>📅 Data Booking</h3>
      <p><strong>Tanggal Booking:</strong> {{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y - H:i') }} WIB</p>
      <p><strong>Nama Pelaksanaan:</strong> {{ $booking->tanggal_pelaksanaan ? \Carbon\Carbon::parse($booking->tanggal_pelaksanaan)->format('d M Y - H:i') : '-' }}</p>
      <p><strong>Status:</strong> 
        <span class="badge waiting">{{ $booking->status }}</span>
      </p>
      <p><strong>Durasi Treatment:</strong> {{ $booking->treatments->sum(function($t) {
      list($jam, $menit, $detik) = explode(':', $t->durasi);
      return ((int)$jam * 60) + (int)$menit;
  }) }}
         menit</p>
    </div>

    <div class="section blue">
      <h3>💆 Treatment</h3>
      <p><strong>Jenis Treatment:</strong> {{ $booking->treatments->pluck('nama_treatment')->implode(', ') }}</p>
    </div>

    <div class="section green">
      <h3>💳 Pembayaran</h3>
      <p><strong>Metode Pembayaran:</strong> {{ ucfirst($booking->metode_pembayaran) }}</p>
      <p><strong>Total Harga:</strong> Rp {{ number_format($booking->total_bayar, 0, ',', '.') }}</p>
      <p><strong>DP:</strong> Rp {{ number_format($booking->dp_awal, 0, ',', '.') }}</p>
      <p><strong>Sisa Bayar:</strong> <span class="price-due">Rp {{ number_format($booking->sisa_bayar, 0, ',', '.') }}</span></p>
    </div>

    @if ($booking->bukti_pembayaran)
      <p><strong>Bukti Pembayaran:</strong></p>
      <a href="{{ asset('storage/' . $booking->bukti_pembayaran) }}" target="_blank" class="d-inline-flex align-items-center gap-2">
        <i class="bi bi-file-earmark-image-fill" style="font-size: 1.5rem; color: #0d6efd;"></i>
        <span>Lihat Bukti Pembayaran</span>
      </a>
    @else
      <p><strong>Bukti Pembayaran:</strong> <em>Tidak tersedia</em></p>
    @endif

    <div class="actions">
      <button class="btn grey" onclick="closeDetailModal({{ $booking->id_booking }})">Kembali</button>
      <form action="{{ route('booking.diterima', $booking->id_booking) }}" method="POST" style="display:inline;">
        @csrf
        <input type="hidden" name="aksi" value="batal">
        <button type="submit" class="btn red">Batalkan</button>
      </form>
      <form action="{{ route('booking.diterima', $booking->id_booking) }}" method="POST" style="display:inline;">
        @csrf
        <input type="hidden" name="aksi" value="konfirmasi">
        <button type="submit" class="btn blue">Konfirmasi</button>
      </form>
    </div>
  </div>
</div>
@endforeach
<script>
function closeDetailModal(id) {
  document.getElementById('modalDetail' + id).style.display = 'none';
}
function openDetailModal(id) {
  document.getElementById('modalDetail' + id).style.display = 'block';
}


// Tutup modal jika klik di luar area modal
window.onclick = function(event) {
  const modals = document.querySelectorAll('.modal');
  modals.forEach(modal => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
}
</script>
<script>
  let daftar = [];
  const daftarTreatment = document.getElementById('daftarTreatment');
  const totalBayar = document.getElementById('totalBayar');

  function formatRupiah(angka) {
    return 'Rp ' + angka.toLocaleString('id-ID');
  }

  function tambahTreatment() {
    const treatment = document.getElementById('treatment').value.trim();
    const harga = parseInt(document.getElementById('harga').value);

    if (treatment && !isNaN(harga) && harga > 0) {
      daftar.push({ treatment, harga });
      renderDaftar();
      document.getElementById('treatment').value = '';
      document.getElementById('harga').value = '';
    }
  }

  function hapusTreatment(index) {
    daftar.splice(index, 1);
    renderDaftar();
  }

  function renderDaftar() {
    daftarTreatment.innerHTML = '';
    let total = 0;
    daftar.forEach((item, index) => {
      total += item.harga;
      const li = document.createElement('li');
      li.className = 'list-group-item d-flex justify-content-between align-items-center';
      li.innerHTML = `
        ${item.treatment} - ${formatRupiah(item.harga)}
        <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusTreatment(${index})">
          <i class="bi bi-trash"></i>
        </button>
      `;
      daftarTreatment.appendChild(li);
    });
    totalBayar.textContent = formatRupiah(total);
  }

  document.getElementById('formTransaksi').addEventListener('submit', function(e) {
    e.preventDefault();
    const data = {
      pelanggan: document.getElementById('namaPelanggan').value,
      pelangganBaru: document.getElementById('pelangganBaru').checked,
      tanggal: document.getElementById('tanggal').value,
      metode: document.getElementById('metodePembayaran').value,
      treatments: daftar
    };

    console.log("Data dikirim:", data);
alert("Transaksi berhasil disimpan!");
window.location.href = "transaksi.html";
  });
</script>

@endsection