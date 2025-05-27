@extends('layout.app')
@section('title', 'Tranksaksi pembayaran')
@section('content')
@section('nama')
        <h3 class="mt-4">Transaksi Pembayaran</h3>
        
@endsection
    
    <!-- Main content -->
      <div class="card-info">
        <h5 class="text-center text-danger fw-bold">Daftar Transaksi Pembayaran</h5>
        <p class="text-center">Lihat seluruh riwayat pembayaran pelanggan di salon.</p>

        <!-- Total Lunas -->
        <div class="card-purple mb-3 d-flex justify-content-between align-items-center">
          <div><i class="bi bi-cash-coin"></i> <strong>Total Pembayaran Lunas :</strong></div>
          <h5 class="text-end text-primary mb-0">Rp 1.300.000</h5>
        </div>

        <!-- Tombol Tambah Transaksi -->
        <div class="text-end mb-3">
<button class="btn btn-pink btn-sm btn-detail" onclick="openTransaksiModal()">
  <i class="bi bi-plus-lg"></i> Tambah Transaksi
</button>
        </div>

        <!-- Tabs -->
        @include('layout.tabs')

        <!-- Total -->
        <div class="card-purple mb-3 p-3 d-flex justify-content-between align-items-center"
     style="background-color: rgba(25, 135, 84, 0.5);">
          <div><i class="bi bi-cash-coin"></i> <strong>Total Pembayaran Lunas :</strong></div>
          <h5 class="text-end  mb-0">Rp 1.300.000</h5>
        </div>
       

        <!-- Table -->
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
              <tr>
                <td>1</td>
                <td>Anisa Dwi Andini</td>
                <td>07 - 02 - 2025</td>
                <td>Transfer</td>
                <td>Rp 300.000</td>
                <td><span class="status-lunas">Lunas</span></td>
                <td><button class="btn btn-sm btn-detail" onclick="openDetailModal()">Detail</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Tiara Andana Dahlia</td>
                <td>09 - 03 - 2025</td>
                <td>Qris</td>
                <td>Rp 1.000.000</td>
                <td><span class="status-lunas">Lunas</span></td>
                <td><button class="btn btn-sm btn-detail">Detail</button></td>
              </tr>
            </tbody>
          </table>
        </div>
<!-- Modal -->
<div class="modal" id="modalDetail">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4" style="background-color: white; width: 100%;">

      <div class="modal-header bg-pink text-white">
        <h5 class="modal-title" id="modalDetailLabel" style="color: black">Detail Pembayaran Langsung</h5>
        <button type="button" class="btn-close" onclick="closeModal()"></button>
      </div>

      <div class="modal-body">
        <p><strong>Nama Pelanggan:</strong> Adelia Salsabila</p>
        <p><strong>Jenis Pelanggan:</strong> Tidak Terdaftar</p>
        <p><strong>Tanggal Transaksi:</strong> 02 April 2025</p>
        <p><strong>Metode Pembayaran:</strong> Cash <span class="badge bg-success">Lunas</span></p>
        <hr>
        <p><strong>Treatment yang Dipilih:</strong></p>
        <ul>
          <li>Smoothing - Rp 600.000</li>
        </ul>
        <hr>
        <p><strong>Subtotal:</strong> Rp 600.000</p>
        <p><strong>DP:</strong> Rp 100.000</p>
        <p><strong><span class="text-danger">Sisa Bayar:</span></strong> <span class="text-danger fw-bold">Rp 500.000</span></p>
        <p><strong>Tunai:</strong> Rp 500.000</p>
        <p><strong>Kembalian:</strong> Rp 0</p>
      </div>

      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" onclick="closeModal()">Kembali</button>
        <button type="button" class="btn btn-primary">Cetak Struk</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Transaksi Pembayaran -->
<div class="modal" id="modalTransaksi">
  <div class="modal-dialog">
    <div class="modal-content p-4" style="background-color: white; width: 100%;">
      <div class="modal-header border-0">
        <h5 class="modal-title w-100 text-center text-pink fw-bold" id="modalTransaksiLabel">
          <i class="bi bi-plus-circle"></i> Tambah Transaksi Pembayaran
        </h5>
        <button type="button" class="btn-close" onclick="closeModal()"></button>
      </div>
      <div class="modal-body">

        <form id="formTransaksi" class="card-info mx-auto" style="max-width: 700px;">
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-person"></i> Cari Nama Pelanggan</label>
          <input type="text" id="namaPelanggan" class="form-control" placeholder="Masukkan Nama Pelanggan Terdaftar...">
          <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" id="pelangganBaru">
            <label class="form-check-label" for="pelangganBaru">Tambahkan Pelanggan Baru (Belum Punya Akun)</label>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Tanggal</label>
            <input type="date" id="tanggal" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Metode Pembayaran</label>
            <select id="metodePembayaran" class="form-select">
              <option value="">Pilih Metode</option>
              <option value="cash">Cash</option>
              <option value="transfer">Transfer</option>
              <option value="qris">QRIS</option>
            </select>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label"><i class="bi bi-scissors"></i> Pilih Treatment</label>
          <div class="d-flex gap-2">
            <input type="text" id="treatment" class="form-control" placeholder="Nama treatment...">
            <input type="number" id="harga" class="form-control" placeholder="Harga" style="width: 130px;">
            <button type="button" class="btn btn-success" onclick="tambahTreatment()"><i class="bi bi-plus-lg"></i></button>
          </div>
        </div>

        <ul id="daftarTreatment" class="list-group mb-3"></ul>

        <div class="d-flex justify-content-end align-items-center mb-3">
          <strong class="me-2 text-success"><i class="bi bi-cash-coin"></i> Total Bayar:</strong>
          <span id="totalBayar" class="fw-bold text-primary">Rp 0</span>
        </div>

        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" onclick="history.back()"><i class="bi bi-arrow-left"></i> Kembali</button>
          <button type="submit" class="btn btn-pink"><i class="bi bi-save"></i> Simpan Transaksi</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  function openDetailModal() {
    document.getElementById("modalDetail").style.display = "block";
  }
  function openTransaksiModal() {
    document.getElementById("modalTransaksi").style.display = "block";
  }

  

  function closeModal() {
    document.getElementById("modalTransaksi").style.display = "none";
    document.getElementById("modalDetail").style.display = "none";
  }

  // Tutup modal jika klik di luar
  window.onclick = function(event) {
    const modalTransaksi = document.getElementById("modalTransaksi");
    const modalDetail = document.getElementById("modalDetail");
    if (event.target === modalDetail) {
      modalDetail.style.display = "none";
    }
    if (event.target === modalTransaksi) {
      modalTransaksi.style.display = "none";
    }
    
  }
</script>
@endsection
