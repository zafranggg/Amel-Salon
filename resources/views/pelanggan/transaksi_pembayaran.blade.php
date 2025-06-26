@extends('layout.app')
@section('title', 'Tranksaksi pembayaran')
@section('content')
@section('nama')
    <h3 class="mt-4">Transaksi Pembayaran</h3>
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
    <h5 class="text-center text-danger fw-bold">Daftar Transaksi Pembayaran</h5>
    <p class="text-center">Lihat seluruh riwayat pembayaran Anda di salon.</p>

    <!-- Tabs -->
    @include('layout.tabs2')

    <!-- Table -->
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Metode</th>
              <th>Total Bayar</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
      @forelse ($transaksi as $i => $trx)
        <tr>
          <td>{{ $i + 1 }}</td>
          <td>{{ \Carbon\Carbon::parse($trx->tanggal_transaksi)->format('d - m - Y') }}</td>
          <td>{{ ucfirst($trx->metode_pembayaran) }}</td>
          <td>Rp {{ number_format($trx->total_pembayaran, 0, ',', '.') }}</td>
          <td><span class="status-lunas">Lunas</span></td>
          <td>
            <button class="btn btn-sm btn-detail" onclick="tampilkanDetail({{ $trx->id_transaksi}})">Detail</button>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center">Belum ada transaksi</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content p-4">
      <div class="modal-header bg-pink text-white">
        <h5 class="modal-title" id="modalDetailLabel" style="color: black">Detail Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Akan diisi oleh JavaScript -->
        <div id="isiDetailTransaksi">
          <p><em>Memuat detail transaksi...</em></p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function tampilkanDetail(id) {
  fetch(`/riwayat-transaksi/${id}/detail`)
    .then(res => {
      if (!res.ok) {
        return res.text().then(text => { throw new Error(`${res.status} – ${text}`) });
      }
      return res.json();
    })
    .then(data => {
      const listHTML = data.treatments.map(t =>
        `<li>${t.nama} – Rp ${parseInt(t.harga).toLocaleString()}</li>`
      ).join('');

      document.querySelector('#modalDetailLabel').innerText = 'Detail Transaksi #' + id;
      document.querySelector('#modalDetail .modal-body').innerHTML = `
        <p><strong>Nama Pelanggan:</strong> ${data.nama_pelanggan}</p>
        <p><strong>Tanggal Transaksi:</strong> ${data.tanggal}</p>
        <p><strong>Metode Pembayaran:</strong> ${data.metode}</p>
        <hr>
        <p><strong>Treatment yang Dipilih:</strong></p>
        <ul id="listTreatments">
          ${listHTML}
        </ul>
        <hr>
        <p><strong>Subtotal:</strong> Rp ${parseInt(data.total).toLocaleString()}</p>
        <p><strong>Uang Dibayar:</strong> Rp ${parseInt(data.uang_dibayar).toLocaleString()}</p>
        <p><strong>Kembalian:</strong> Rp ${parseInt(data.kembalian).toLocaleString()}</p>
        <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <a href="/riwayat-transaksi/${id}/struk" target="_blank" class="btn btn-primary">
          Cetak Struk
        </a>
        </div>
        </div>
      `;
      new bootstrap.Modal(document.getElementById('modalDetail')).show();
    })
    .catch(err => {
      console.error('Error:', err);
      alert('Gagal mengambil detail transaksi: ' + err.message);
    });
}
</script>
@endsection
