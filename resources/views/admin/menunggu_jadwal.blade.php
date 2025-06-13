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
            background-color: rgba(0, 0, 0, 0.4);
            animation: fadeIn 0.3s ease forwards;
        }

        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border-radius: 15px;
            width: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
            animation: slideIn 0.4s ease;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
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

        .purple {
            background: #e7e3fb;
        }

        .pink {
            background: #fde7e7;
        }

        .blue {
            background: #e0ecf8;
        }

        .green {
            background: #e0f6e7;
        }

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
            gap: 10px;
            /* Tambahan opsional untuk jarak antar tombol */
        }

        .actions .btn {
            flex: 1;
            /* Bagi rata */
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
        }

        .btn.green {
            background-color: #28a745;
        }

        .btn.red {
            background-color: #dc3545;
        }

        .btn.blue {
            background-color: #007bff;
        }

        .btn.grey {
            background-color: #6c757d;
        }
    </style>
@endsection
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
        <h5 class="text-end text-primary mb-0">Rp 2.665.000</h5>
    </div>

    <!-- Tabs -->
    @include('layout.tabs')

    <!-- Total Pembayaran dari Booking -->
    <div class="card-purple mb-3 p-3 d-flex justify-content-between align-items-center"
        style="background-color: rgba(61, 13, 253, 0.5);">
        <div><i class="bi bi-cash-coin"></i> <strong>Total Pembayaran Dari Booking (Lunas) :</strong></div>
        <h5 class="text-end  mb-0">Rp 1.450.000</h5>
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
    <div id="modalDetail" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDetailModal()">&times;</span>
            <h2>🔍 Detail Booking - Smooting</h2>

            <div class="section purple">
                <h3>📋 Data Pelanggan</h3>
                <p><strong>Nama Pelanggan:</strong> Adelia Salsabila</p>
                <p><strong>No. HP:</strong> 0822–2222–2222</p>
                <p><strong>Jenis Pelanggan:</strong> Tidak Terdaftar</p>
            </div>

            <div class="section pink">
                <h3>📅 Data Pelanggan</h3>
                <p><strong>Tanggal Booking:</strong> 28 Maret 2025 - 16:00 WIB</p>
                <p><strong>Nama Pelaksanaan:</strong> 02 April 2025 - 10:30 WIB</p>
                <p><strong>Status:</strong> <span class="badge waiting">Menunggu Jadwal</span></p>
                <p><strong>Durasi Treatment:</strong> 240 menit</p>
            </div>

            <div class="section blue">
                <h3>💆 Treatment</h3>
                <p><strong>Jenis Treatment:</strong> Smooting</p>
            </div>

            <div class="section green">
                <h3>💳 Treatment</h3>
                <p><strong>Metode Pembayaran:</strong> Transfer</p>
                <p><strong>Total Harga:</strong> Rp 600.000</p>
                <p><strong>DP:</strong> Rp 100.000</p>
                <p><strong>Sisa Bayar:</strong> <span class="price-due">Rp 500.000</span></p>
            </div>

            <div class="actions">
                <button class="btn grey" onclick="closeDetailModal()">Kembali</button>
                <a href="{{ url('/edit_booking') }}"><button class="btn green">Edit</button></a>
                <button class="btn red">Batalkan</button>
                <button class="btn blue">Jalankan Booking</button>
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

        function closeDetailModal() {
            document.getElementById("modalDetail").style.display = "none";
        }

        // Tutup modal jika klik di luar
        window.onclick = function(event) {
            const modalDetail = document.getElementById("modalDetail");
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
                daftar.push({
                    treatment,
                    harga
                });
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
