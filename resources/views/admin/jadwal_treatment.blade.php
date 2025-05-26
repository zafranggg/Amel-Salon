    @extends('layout.app')
    @section('content')
        @section('nama')
            <h3 class="mt-4">Jadwal Treatment</h3>
        @endsection

        <!-- Main Content -->
        <div class="content">

            <!-- Toggle Section -->
            <div class="toggle-box">
                <label class="toggle-label">Fitur Jadwal :</label>
                <input type="checkbox" class="form-check-input" id="fiturJadwal">

                <label class="toggle-label">Fitur Booking :</label>
                <input type="checkbox" class="form-check-input" id="fiturBooking">
            </div>

            <p class="toggle-box" style="color: #6c757d;
        font-size: 13px;">
                ctt : Fitur booking dimatikan, yang mati adalah pembookingan yang ada di akun pelanggan,
                sedangkan di admin tetap bisa menambahkan bookingan yang sudah terkonfirmasi.
            </p>
    <!-- Button Section -->
    <div class="mb-4" style="display: flex; flex-direction: column; gap: 0.5rem; width: max-content;">
        <button class="btn btn-pink" id="btnTambahBooking" style="display: none;" onclick="openTransaksiModal()">Tambah Booking</button>
        <button class="btn btn-pink" id="btnTambahJadwal" style="display: none;" >Tambah Jadwal</button>
    </div>



            <!-- Treatment Box -->
            <div class="treatment-box">
                <h6>Cek Jadwal Ketersediaan Treatment Per Tanggal</h6>
                <input type="date" class="form-control mb-3" value="2025-04-02">

                <h6 class="mt-3">Jadwal Booking dan Ketersediaan - 02/04/2025</h6>

                <div class="d-flex justify-content-between align-items-center border p-3 rounded mb-2">
                    <div>
                        <strong>Smoothing</strong><br>
                        <span class="badge badge-time p-2">12.00 - 16.00</span>
                    </div>
                    <button class="btn btn-pink btn-sm" onclick="openDetailModal()">Detail</button>
                </div>

                <div class="d-flex justify-content-between align-items-center border p-3 rounded mb-2">
                    <div>
                        <strong>Make Up</strong><br>
                        <span class="badge badge-time p-2">10.00 - 12.00</span>
                    </div>
                    <button class="btn btn-pink btn-sm">Detail</button>
                </div>

                <div class="text-center text-muted">-</div>
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

        <!-- Cari Nama Pelanggan -->
        <div class="mb-3">
          <label for="namaPelanggan" class="form-label fw-semibold"><i class="bi bi-fire"></i> Cari Nama Pelanggan</label>
          <input type="text" class="form-control border-pink" id="namaPelanggan" placeholder="Masukkan Nama Pelanggan Terdaftar...">
          <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" id="tambahPelangganBaru">
            <label class="form-check-label small" for="tambahPelangganBaru">Tambahkan Pelanggan Baru (Belum Punya Akun)</label>
          </div>
        </div>

        <!-- Tanggal dan Metode -->
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal">
          </div>
          <div class="col-md-6 mb-3">
            <label for="metode" class="form-label">Metode Pembayaran</label>
            <input type="text" class="form-control" id="metode" placeholder="Pilih Metode">
          </div>
        </div>

        <!-- Waktu -->
        <div class="mb-3">
          <label for="waktu" class="form-label">Waktu</label>
          <input type="time" class="form-control" id="waktu">
        </div>

        <!-- Treatment -->
        <div class="row align-items-end mb-3">
          <div class="col-md-6">
            <label for="treatment" class="form-label">Pilih Treatment</label>
            <input type="text" class="form-control" id="treatment" placeholder="-- Cari treatment --">
          </div>
          <div class="col-md-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga">
          </div>
          <div class="col-md-3">
            <button class="btn btn-danger w-100">Hapus</button>
          </div>
        </div>
        <div class="mb-3">
          <button class="btn btn-success"><i class="bi bi-plus-circle"></i> Tambah Treatment</button>
        </div>

        <!-- DP dan Status -->
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="dp" class="form-label"><i class="bi bi-cash-coin"></i> DP Awal</label>
            <input type="text" class="form-control" id="dp" placeholder="Masukan Nominal">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label"><i class="bi bi-clock"></i> Status Booking</label>
            <div class="form-control bg-light">Menunggu Jadwal</div>
          </div>
        </div>

        <!-- Total & Sisa Bayar -->
        <div class="d-flex justify-content-between">
          <span class="text-muted">Total Bayar : <strong class="text-danger">Rp 0</strong></span>
          <span class="text-muted">Sisa Bayar : <strong class="text-danger">Rp 0</strong></span>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer border-0 justify-content-between">
        <button type="button" class="btn btn-secondary" onclick="closeModal()"></i> Kembali</button>
        <button type="button" class="btn btn-pink" onclick="closeModal()">Simpan Transaksi</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Detail -->
<div id="modalDetail" class="modal">
  <div class="modal-content">
    <span class="close-button" onclick="closeModal()">&times;</span>
    <h2>Booking - Smooting</h2>
    <p><strong>Nama Pelanggan (baru):</strong> Adelia Salsabila</p>
    <p><strong>Nomor HP:</strong> 081234567890</p>
    <p><strong>Tanggal dan Waktu Booking:</strong> 28/03/2025</p>
    <br>
    <p style="color: rgb(255, 119, 0)"><strong style="color: black">Status Booking:</strong> Menunggu Jadwal</p>
    <p><strong>Treatment:</strong> Smoothing</p>
    <p><strong>Durasi:</strong> 240 Menit</p>
    <p><strong>Metode Pembayaran DP:</strong> Transfer</p>
    <p><strong>Harga:</strong> Smoothing</p>
    <p><strong>DP:</strong> Rp 100.000</p>
    <p><strong>Sisa Bayar:</strong> Rp 500.000</p>
  </div>
</div>

        <!-- JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const checkbox = document.getElementById('fiturJadwal');
                const btnJadwal = document.getElementById('btnTambahJadwal');

                checkbox.addEventListener('change', function () {
                    btnJadwal.style.display = this.checked ? 'inline-block' : 'none';
                });
            });
            document.addEventListener('DOMContentLoaded', function () {
                const checkbox = document.getElementById('fiturBooking');
                const btnJadwal = document.getElementById('btnTambahBooking');

                checkbox.addEventListener('change', function () {
                    btnJadwal.style.display = this.checked ? 'inline-block' : 'none';
                });
            });
        </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script>
  function openTransaksiModal() {
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
    @endsection
