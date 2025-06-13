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
                <tr>
                    <td>1</td>
                    <td>Anisa Dwi Andini</td>
                    <td>081325678901</td>
                    <td>Cuci Kuku</td>
                    <td>07 - 02 - 2025</td>
                    <td>Rp 300.000</td>
                    <td><button class="btn btn-sm btn-detail" onclick="openDetailModal()">Detail</button></td>
                </tr>
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
                <tr>
                    <td>1</td>
                    <td>Fatimah Zara</td>
                    <td>2025-06-01</td>
                    <td>Hair Spa + Creambath</td>
                    <td>Lunas</td>
                    <td>Rp 90.000</td>
                    <td><button class="btn btn-sm btn-detail" onclick="openDetailModal2()">Detail</button></td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Modal Detail -->
    <div class="modal" id="modalDetail">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4" style="background-color: white; width: 100%; border-radius: 15px;">
                <div class="modal-header" style="background-color: #ffe6f0; border-radius: 10px;">
                    <h5 class="modal-title" style="color: #d63384; font-weight: bold;">
                        🧾 Detail Pelanggan
                    </h5>
                    <button type="button" class="btn-close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body" style="font-size: 15px;">
                    <p>🆔 <strong>ID Pelanggan:</strong> CUSABS0231</p>
                    <p>🛡️ <strong>Status:</strong> Terdaftar</p>
                    <p>🙋‍♀️ <strong>Nama:</strong> Fatimah Zara</p>
                    <p>📱 <strong>No. HP:</strong> 0813-1111-2222</p>
                    <p>💆‍♀️ <strong>Layanan:</strong> Hair Spa + Creambath</p>
                    <p>📅 <strong>Tanggal:</strong> 2025-06-01</p>
                    <p>💳 <strong>Metode Pembayaran:</strong> Cash</p>
                    <p>💰 <strong>Total Bayar:</strong> <span style="color: red;">Rp 90.000</span></p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn" style="background-color: #ff66b2; color: white;"
                        onclick="closeModal()">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Detail -->
    <div class="modal" id="modalDetail2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4" style="background-color: white; width: 100%; border-radius: 15px;">
                <div class="modal-header" style="background-color: #ffe6f0; border-radius: 10px;">
                    <h5 class="modal-title" style="color: #d63384; font-weight: bold;">
                        🧾 Detail Pelanggan
                    </h5>
                    <button type="button" class="btn-close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body" style="font-size: 15px;">
                    <p>🆔 <strong>ID Pelanggan:</strong> CUSABS0231</p>
                    <p>🛡️ <strong>Status:</strong> Terdaftar</p>
                    <p>🙋‍♀️ <strong>Nama:</strong> Fatimah Zara</p>
                    <p>📱 <strong>No. HP:</strong> 0813-1111-2222</p>
                    <p>💆‍♀️ <strong>Layanan:</strong> Hair Spa + Creambath</p>
                    <p>📅 <strong>Tanggal:</strong> 2025-06-01</p>
                    <p>💳 <strong>Metode Pembayaran:</strong> Tranfers</p>
                    <p>💰 <strong>Total Bayar:</strong> <span style="color: red;">Rp 90.000</span></p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn" style="background-color: #ff66b2; color: white;"
                        onclick="closeModal()">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Script -->
<script>
    function openDetailModal() {
        document.getElementById("modalDetail").style.display = "block";
    }
    function openDetailModal2() {
        document.getElementById("modalDetail2").style.display = "block";
    }

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

@endsection
