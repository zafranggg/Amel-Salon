@extends('layout.app')
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
<button class="btn btn-pink btn-sm btn-detail" onclick="openModal()">
  <i class="bi bi-plus-lg"></i> Tambah Transaksi
</button>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="#"><i class="bi bi-credit-card tab-icon"></i>Pembayaran Langsung</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="DariBooking.html"><i class="bi bi-calendar tab-icon"></i>Dari Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="MenungguJadwal.html"><i class="bi bi-clock tab-icon"></i>Menunggu Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="MenungguKonfirmasi.html"><i class="bi bi-person-check tab-icon"></i>Menunggu Konfirmasi</a>
          </li>
        </ul>

        <!-- Total -->
        <div class="bg-success bg-opacity-25 rounded p-3 mb-3">
          <strong>Total Pembayaran Lunas :</strong> <span class="text-success fw-bold">Rp 1.300.000</span>
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
                <td><button class="btn btn-sm btn-detail">Detail</button></td>
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
  function openModal() {
    document.getElementById("modalTransaksi").style.display = "block";
  }

  function openDetailModal() {
    document.getElementById("modalDetail").style.display = "block";
  }

  function closeModal() {
    document.getElementById("modalTransaksi").style.display = "none";
    document.getElementById("modalDetail").style.display = "none";
  }

  // Tutup modal jika klik di luar
  window.onclick = function(event) {
    const modalTransaksi = document.getElementById("modalTransaksi");
    const modalDetail = document.getElementById("modalDetail");

    if (event.target === modalTransaksi) {
      modalTransaksi.style.display = "none";
    }
    if (event.target === modalDetail) {
      modalDetail.style.display = "none";
    }
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
