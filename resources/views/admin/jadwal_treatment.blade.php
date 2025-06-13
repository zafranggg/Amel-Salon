    @extends('layout.app')
    @section('title', 'Jadwal Treamtment')
    @section('style')
        <style>
            .btn-purple {
                background-color: #cc59d2;
                color: white;
            }

            .calendar-wrapper button.active {
                background-color: #ffcc99;
                font-weight: bold;
            }
        </style>
        <style>
            /* Modal Background */


            /* Close Button */
            .close-button {
                position: absolute;
                right: 20px;
                top: 15px;
                font-size: 24px;
                font-weight: bold;
                color: #ff3385;
                cursor: pointer;
            }

            /* Title */
            .modal-content h2 {
                color: #ff3385;
                margin-top: 0;
            }

            .toggle-box {
                border: 2px solid #ff69b4;
                padding: 15px;
                border-radius: 20px;
                background-color: white;
                margin-bottom: 20px;
            }

            .toggle-label {
                font-weight: bold;
            }

            .btn-pink {
                background-color: #ff69b4;
                color: white;
                font-weight: bold;
            }

            .treatment-box {
                border: 2px solid #ff69b4;
                padding: 20px;
                border-radius: 20px;
                background-color: white;
            }

            .badge-time {
                background-color: #ff69b4;
                color: white;
            }

            .toggle-box {
                display: flex;
                align-items: center;
                justify-content: center;
                border: 1px solid #ff3399;
                border-radius: 40px;
                padding: 20px 30px;
                width: fit-content;
                margin: 40px auto;
                gap: 40px;
            }

            .toggle-label {
                font-weight: bold;
                color: #ff3399;
                font-size: 16px;
            }

            .form-check-input {
                appearance: none;
                -webkit-appearance: none;
                width: 40px;
                height: 22px;
                background-color: #aaa;
                position: relative;
                outline: none;
                cursor: pointer;
                margin-left: 8px;
                margin-right: 10px;
                vertical-align: middle;
                transition: background-color 0.3s;
                border-radius: 50%;
            }

            .form-check-input::before {
                content: "";
                position: absolute;
                width: 18px;
                height: 18px;
                border-radius: 50%;
                background: #fff;
                top: 2px;
                left: 2px;
                transition: transform 0.3s;

            }

            .form-check-input:checked {
                background-color: #ff3399;
            }

            .form-check-input:checked::before {
                transform: translateX(18px);
            }

            .note {
                text-align: center;
                margin-top: 20px;
                color: #6c757d;
                font-size: 13px;
            }

            .wide-content {
                max-width: 100%;
                padding-left: 3rem;
                padding-right: 3rem;
            }
        </style>
    @endsection
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
        <!-- Tabs -->
        <ul class="nav nav-tabs mb-3" id="riwayatTabs">
            <li class="nav-item">
                <a class="nav-link active" id="tabLangsung" href="#" onclick="showTab('langsung')">
                    <i class="bi bi-clock-fill tab-icon"></i> Jadwal Hari Ini
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabBooking" href="#" onclick="showTab('booking')">
                    <i class="bi bi-calendar-check-fill tab-icon"></i> Booking
                </a>
            </li>
        </ul>

        <div class="container wide-content mt-4" id="contentLangsung">

            <!-- Pilih Tanggal -->
            <div class="mb-3">
                <label for="tanggal" class="form-label text-danger fw-bold">Silahkan Pilih Tanggal!</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control border-primary text-center"
                    value="{{ date('Y-m-d') }}">
                <small class="text-muted">Lihat seluruh jadwal tersedia di salon</small>
            </div>

            <!-- Tombol Staff Hari Ini -->
            <!-- Tombol untuk membuka modal -->
            <button class="btn btn-info mb-3 text-white fw-bold" onclick="openDetailModal2()">
                👥 Staff Hari Ini
            </button>

            <!-- Staff yang Bekerja -->
            <div class="border border-info rounded p-3 mb-4">
                <h5 class="text-info fw-bold">Staff Salon yang Bekerja Pada Hari Ini -
                    {{ \Carbon\Carbon::parse(date('Y-m-d'))->translatedFormat('l, d F Y') }}</h5>
                <div class="mt-3">
                    <div class="alert alert-primary">💇‍♀️ Ariona Sia Dey <span class="fw-bold">(Pagi 08:00 -
                            12:00)</span></div>
                    <div class="alert alert-warning">💇‍♀️ Satika Sonas Anastasy <span class="fw-bold">(Pagi 08:00 -
                            12:00)</span></div>
                    <div class="alert alert-warning">💇‍♀️ Helena Austic Alini <span class="fw-bold">(Pagi 08:00 -
                            12:00)</span></div>
                </div>
            </div>

            <!-- Jadwal Salon Hari Ini -->
            <div class="border border-danger rounded p-3 mb-4 bg-light-pink">
                <h5 class="text-danger fw-bold">Jadwal Salon Hari ini -
                    {{ \Carbon\Carbon::parse(date('Y-m-d'))->translatedFormat('l, d F Y') }}</h5>
                <small class="text-muted">Anda dapat mengatur jam kosong dan padat pada hari ini</small>

                <div class="d-flex flex-wrap gap-2 mt-3">
                    @php
                        $jam = [
                            '09:00',
                            '10:00',
                            '11:00',
                            '12:00',
                            '13:00',
                            '14:00',
                            '15:00',
                            '16:00',
                            '17:00',
                            '18:00',
                            '19:00',
                            '20:00',
                        ];
                        $status = [
                            'Kosong',
                            'Penuh',
                            'Kosong',
                            'Kosong',
                            'Kosong',
                            'Penuh',
                            'Kosong',
                            'Kosong',
                            'Kosong',
                            'Kosong',
                            'Kosong',
                            'Kosong',
                        ];
                    @endphp

                    @foreach ($jam as $index => $j)
                        <button class="btn {{ $status[$index] == 'Kosong' ? 'btn-outline-success' : 'btn-danger' }}"
                            disabled>
                            {{ $j }} - {{ date('H:i', strtotime($j . '+1 hour')) }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Keterangan Jadwal -->
            <div class="border border-success rounded p-3 bg-white">
                <h6 class="fw-bold text-success">📋 Keterangan Jadwal</h6>
                <ul class="list-group mt-2">
                    @foreach ($jam as $index => $j)
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center 
                    {{ $status[$index] == 'Kosong' ? 'list-group-item-success' : 'list-group-item-danger' }}">
                            {{ $j }} - {{ date('H:i', strtotime($j . '+1 hour')) }}
                            <span>{{ $status[$index] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- TAMBAH CATATAN -->
            <div class="border rounded p-3 mb-4 mt-3" style="background-color: #f2f7ff;">
                <p class="text-danger fw-bold">*Anda menonaktifkan fitur Booking, silahkan tambahkan catatan.</p>

                <button class="btn btn-primary mb-2" onclick="openCttModal()">
                    <i class="bi bi-chat-dots"></i> Tambah Catatan
                </button>

                <div class="border p-2 d-flex justify-content-between align-items-center"
                    style="background-color: #fff;">
                    <div>
                        <i class="bi bi-exclamation-triangle-fill text-danger"></i>
                        <span class="text-danger fw-bold">Salon Sedang Tidak Menerima Booking!</span>
                        <br>
                        <small class="text-muted">Ditambahkan: 01 Mei 2025 pukul 08.40</small>
                    </div>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
        <div class="container mt-4" id="contentBooking">
            <!-- PILIH TANGGAL -->
            <div class="mb-3 p-3 rounded" style="background-color: #ffe8d5;">
                <label class="form-label text-danger fw-bold">Silahkan Pilih Tanggal!</label>
                <input type="date" id="selectedDate" class="form-control" value="{{ now()->format('Y-m-d') }}">
            </div>

            <!-- KALENDER -->
            <div class="calendar-wrapper border rounded p-3 mb-4">
                <div class="d-flex flex-wrap justify-content-start gap-2">
                    @for ($i = 1; $i <= 31; $i++)
                        <button
                            class="btn btn-outline-warning {{ $i == 7 ? 'active' : '' }}">{{ $i }}</button>
                    @endfor
                </div>
            </div>

            <!-- JAM YANG SUDAH DIBOOKING -->
            <div class="border rounded p-3 mb-4 bg-light">
                <h6 class="text-primary">Jam yang Sudah Dipesan pada Tanggal Ini - <span id="selectedDateText">Rabu,
                        07/Mei/2025</span></h6>

                <button class="btn btn-purple mb-2" onclick="openTambahModal()">
                    <i class="bi bi-calendar-plus"></i> Tambah Booking
                </button>

                <div class="d-flex flex-wrap gap-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <button class="btn btn-outline-primary">11.00 - 12.00</button>
                    @endfor
                </div>
            </div>

            <!-- TAMBAH CATATAN -->
            <div class="border rounded p-3 mb-4" style="background-color: #f2f7ff;">
                <p class="text-danger fw-bold">*Anda menonaktifkan fitur Booking, silahkan tambahkan catatan.</p>

                <button class="btn btn-primary mb-2" onclick="openCttModal()">
                    <i class="bi bi-chat-dots"></i> Tambah Catatan
                </button>

                <div class="border p-2 d-flex justify-content-between align-items-center"
                    style="background-color: #fff;">
                    <div>
                        <i class="bi bi-exclamation-triangle-fill text-danger"></i>
                        <span class="text-danger fw-bold">Salon Sedang Tidak Menerima Booking!</span>
                        <br>
                        <small class="text-muted">Ditambahkan: 01 Mei 2025 pukul 08.40</small>
                    </div>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah Staff -->
    <div class="modal" id="modalDetail2">
        <div class="modal-dialog">
            <div class="modal-content border-info rounded-3">
                <div class="modal-header">
                    <h5 class="modal-title text-info fw-bold" id="tambahStaffModalLabel">Tambah Staf <br><small
                            class="text-muted">Hari Ini</small></h5>
                    <button type="button" class="btn-close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body bg-light">

                    <form method="POST" action="#">
                        @csrf

                        <!-- Nama Staff -->
                        <div class="mb-3">
                            <label for="nama_staff" class="form-label text-info fw-semibold">Masukan Nama Staff yang
                                Bekerja Hari Ini</label>
                            <input type="text" name="nama_staff" id="nama_staff" class="form-control"
                                placeholder="Contoh: Ariana Sea Oey" required>
                        </div>

                        <!-- Pilih Shift -->
                        <div class="mb-3">
                            <label for="shift" class="form-label text-info fw-semibold">Shift</label>
                            <select name="shift" id="shift" class="form-select" required>
                                <option selected disabled>Pilih Shift</option>
                                <option value="pagi">Pagi (09.00 - 14.30)</option>
                                <option value="siang">Siang (14.30 - 20.00)</option>
                            </select>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-info text-white fw-bold">+ Tambah</button>
                        </div>
                    </form>

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

                    <!-- Cari Nama Pelanggan -->
                    <div class="mb-3">
                        <label for="namaPelanggan" class="form-label fw-semibold"><i class="bi bi-fire"></i> Cari
                            Nama Pelanggan</label>
                        <input type="text" class="form-control border-pink" id="namaPelanggan"
                            placeholder="Masukkan Nama Pelanggan Terdaftar...">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="tambahPelangganBaru">
                            <label class="form-check-label small" for="tambahPelangganBaru">Tambahkan Pelanggan Baru
                                (Belum Punya Akun)</label>
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
                            <input type="text" class="form-control" id="treatment"
                                placeholder="-- Cari treatment --">
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
    <!-- MODAL TAMBAH CATATAN -->
    <div class="modal" id="modalCtt">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">

                <div class="modal-header border-0">
                    <h5 class="modal-title w-100 text-center fw-bold" id="modalTambahCatatanLabel"
                        style="color: #ff299c;">
                        🧾 Tambah Catatan
                    </h5>
                </div>

                <div class="modal-body">

                    <!-- TEMPLATE CATATAN -->
                    <div class="mb-3">
                        <p class="mb-2 fw-semibold"><i class="bi bi-pin-angle-fill text-danger"></i> Pilih Template
                            Catatan</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-warning rounded-pill px-4">📜 Tidak Menerima</button>
                            <button class="btn btn-light rounded-pill px-4 border border-danger text-danger">👥 Datang
                                Langsung</button>
                        </div>
                    </div>

                    <!-- TEXTAREA CATATAN -->
                    <div class="mb-3">
                        <label for="catatanText" class="form-label fw-semibold text-primary">Catatan</label>
                        <textarea id="catatanText" rows="3" class="form-control border-primary">📜 Salon Sedang Tidak Menerima Booking!</textarea>
                    </div>

                </div>

                <div class="modal-footer border-0 justify-content-between">
                    <button type="button" class="btn btn-dark" onclick="closeModal()">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send-check"></i> Simpan Catatan
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Script -->
    <script>
        function openDetailModal2() {
            document.getElementById("modalDetail2").style.display = "block";
        }

        function openTambahModal() {
            document.getElementById("modalTransaksi").style.display = "block";
        }
        function openCttModal() {
            document.getElementById("modalCtt").style.display = "block";
        }

        function closeModal() {
            document.getElementById("modalDetail2").style.display = "none";
            document.getElementById("modalTransaksi").style.display = "none";
        }

        window.onclick = function(event) {
            // const modalDetail = document.getElementById("modalCtt");
            // if (event.target === modalDetail) {
            //     modalCtt.style.display = "none";
            // }
            const modalDetail2 = document.getElementById("modalDetail2");
            if (event.target === modalDetail2) {
                modalDetail2.style.display = "none";
            }
            const modalTransaksi = document.getElementById("modalTransaksi");
            if (event.target === modalTransaksi) {
                modalTransaksi.style.display = "none";
            }
            const modalCtt = document.getElementById("modalCtt");
            if (event.target === modalCtt) {
                modalCtt.style.display = "none";
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
