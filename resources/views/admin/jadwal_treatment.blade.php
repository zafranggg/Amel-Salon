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

            {{-- <!-- Pilih Tanggal -->
            <div class="mb-3">
                <label for="tanggal" class="form-label text-danger fw-bold">Silahkan Pilih Tanggal!</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control border-primary text-center"
                    value="{{ date('Y-m-d') }}">
                <small class="text-muted">Lihat seluruh jadwal tersedia di salon</small>
            </div> --}}

            <!-- Tombol Staff Hari Ini -->
            <!-- Tombol untuk membuka modal -->
            <button class="btn btn-info mb-3 text-white fw-bold" onclick="openDetailModal2()">
                👥 Staff Hari Ini
            </button>

            <!-- Staff yang Bekerja Hari Ini -->
            <div class="border border-info rounded p-3 mb-4">
                <h5 class="text-info fw-bold">
                    Staff Salon yang Bekerja Pada Hari Ini -
                    {{ \Carbon\Carbon::parse($tanggal ?? date('Y-m-d'))->translatedFormat('l, d F Y') }}
                </h5>

                <div class="mt-3">
                    @forelse ($staffs as $staff)
                        <div class="alert {{ $staff->shift == 'pagi' ? 'alert-primary' : 'alert-warning' }} d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                💇‍♀️ <strong>{{ $staff->nama_staff }}</strong>
                                <span class="fw-semibold">
                                    ({{ ucfirst($staff->shift) }} 
                                    {{ $staff->shift == 'pagi' ? '09:00 - 14:30' : '14:30 - 20:00' }})
                                </span>
                            </div>
                            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Yakin hapus staff ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Hapus Staff">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="alert alert-secondary">
                            Belum ada staff yang ditambahkan untuk hari ini.
                        </div>
                    @endforelse
                </div>
            </div>

            <button type="button" class="btn btn-success fw-bold mb-3" onclick="tampilkanModalTambahJadwal()">
                <i class="bi bi-calendar-plus"></i> Tambah Jadwal
            </button>


            <!-- Jadwal Salon Hari Ini -->
            <div class="border border-danger rounded p-3 mb-4 bg-light-pink">
                <h5 class="text-danger fw-bold">Jadwal Salon Hari ini -
                    {{ \Carbon\Carbon::parse(date('Y-m-d'))->translatedFormat('l, d F Y') }}</h5>
                <small class="text-muted">Anda dapat mengatur jam kosong dan padat pada hari ini</small>

                <div class="d-flex flex-wrap gap-2 mt-3">
                    @foreach ($jadwals as $j)
                        <button class="btn {{ $j->status == 'Kosong' ? 'btn-outline-success' : 'btn-danger' }}" disabled>
                            {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}
                        </button>
                    @endforeach
                </div>

                
            </div>

            <!-- Keterangan Jadwal -->
            @foreach ($jadwals as $j)
                <li class="list-group-item d-flex justify-content-between align-items-center 
                    {{ $j->status == 'Kosong' ? 'list-group-item-success' : 'list-group-item-danger' }}">
                    {{ $j->jam_mulai }} - {{ $j->jam_selesai }}
                    <span>{{ $j->status }}</span>
                    <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash3"></i> Hapus
                        </button>
                    </form>
                </li>
            @endforeach

            <!-- TAMBAH CATATAN -->
            {{-- <div class="border rounded p-3 mb-4 mt-3" style="background-color: #f2f7ff;">
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
            </div> --}}
        </div>
        <div class="container mt-4" id="contentBooking">
            <!-- PILIH TANGGAL -->
            <div class="mb-3 p-3 rounded" style="background-color: #ffe8d5;">
                <label class="form-label text-danger fw-bold">Silahkan Pilih Tanggal!</label>
                <input type="date" id="selectedDate" class="form-control" value="{{ now()->format('Y-m-d') }}">
            </div>

            <!-- KALENDER 
            <div class="calendar-wrapper border rounded p-3 mb-4">
                <div class="d-flex flex-wrap justify-content-start gap-2">
                    @for ($i = 1; $i <= 31; $i++)
                        <button
                            class="btn btn-outline-warning {{ $i == 7 ? 'active' : '' }}">{{ $i }}</button>
                    @endfor
                </div>
            </div>-->

            <!-- JAM YANG SUDAH DIBOOKING -->
            <div class="border rounded p-3 mb-4 bg-light">
                <h6 class="text-primary">Jam yang Sudah Dipesan pada Tanggal Ini - 
                    <span id="selectedDateText">{{ now()->format('l, d M Y') }}</span>
                </h6>

                <button class="btn btn-purple mb-2" onclick="openTambahModal()">
                    <i class="bi bi-calendar-plus"></i> Tambah Booking
                </button>

                <!-- Container jam booking -->
                <div class="d-flex flex-wrap gap-2" id="bookedTimeSlots">
                    <!-- Akan diisi oleh JavaScript -->
                </div>
            </div>

            <!-- TAMBAH CATATAN -->
            {{-- <div class="border rounded p-3 mb-4" style="background-color: #f2f7ff;">
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
            </div> --}}
        </div>
    </div>

    <!-- Modal Tambah jadwal -->
    <div class="modal fade" id="modalTambahJadwal" tabindex="-1" aria-labelledby="judulModalTambah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="judulModalTambah"><i class="bi bi-calendar-plus"></i> Tambah Jadwal Baru</h5>
            <button type="button" class="btn-close" onclick="tutupModalTambahJadwal()" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- Form Tambah Jadwal --}}
            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control" required>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="Kosong">Kosong</option>
                        <option value="Penuh">Penuh</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Staff</label>
                    <input type="text" name="staff" class="form-control" placeholder="Nama Staff">
                </div>
                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="2" placeholder="Catatan..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-save"></i> Simpan</button>
            </form>
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

                    <form method="POST" action="{{ route('staff.store') }}">
                        @csrf

                        <!-- Nama Staff -->
                        <div class="mb-3">
                            <label for="nama_staff" class="form-label text-info fw-semibold">Nama Staff</label>
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

    <!-- Modal Tambah Booking -->
    <div class="modal" id="modalTransaksi">
        <div class="modal-dialog">
            <form method="POST" id="bookingForm" action="{{ route('booking.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content p-4" style="background-color: white; width: 100%;">
                    <div class="modal-header border-0">
                        <h5 class="modal-title w-100 text-center text-pink fw-bold" id="modalTransaksiLabel">
                            <i class="bi bi-calendar-plus"></i> Tambah Booking
                        </h5>
                        <button type="button" class="btn-close" onclick="closeModal()"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Nama Pelanggan -->
                        <div class="mb-3">
                            <label for="namaPelanggan" class="form-label fw-semibold"><i class="bi bi-person"></i> Nama Pelanggan</label>
                            <input type="text" class="form-control border-pink" name="nama_pelanggan" placeholder="Masukkan nama pelanggan..." required>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="pelanggan_baru" value="1" id="tambahPelangganBaru">
                                <label class="form-check-label small" for="tambahPelangganBaru">Pelanggan Baru</label>
                            </div>
                        </div>

                        <!-- Tanggal, Waktu, Metode -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" class="form-control" name="waktu" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="metode" class="form-label">Metode Pembayaran</label>
                            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required onchange="toggleDPRequirement()">
                                <option value="cash">Cash</option>
                                <option value="transfer">Transfer</option>
                                <option value="qris">QRIS</option>
                            </select>
                        </div>

                        <!-- Treatment Dinamis -->
                        <div id="treatments-area">
                            <label class="form-label">Daftar Treatment</label>
                            <div class="row mb-2 treatment-item">
                                <div class="col-md-6">
                                    <select name="treatments[0][id_treatment]" class="form-select treatment-select" onchange="updateHarga(this)">
                                        <option value="">-- Pilih Treatment --</option>
                                        @foreach ($treatments as $t)
                                            <option value="{{ $t->id_treatment }}" data-harga="{{ $t->harga }}">
                                                {{ $t->nama_treatment }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" name="treatments[0][harga]" class="form-control harga-input" placeholder="Harga" readonly>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger w-100 btn-remove-treatment">✕</button>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol tambah treatment -->
                        <div class="mb-3">
                            <button type="button" class="btn btn-success" id="btnAddTreatment">
                                <i class="bi bi-plus-circle"></i> Tambah Treatment
                            </button>
                        </div>

                        <!-- DP & Status -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dp" class="form-label">DP Awal</label>
                                <input type="number" class="form-control" id="dp" name="dp" placeholder="Masukan Nominal">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status Booking</label>
                                <input type="text" class="form-control bg-light" readonly value="Menunggu diterima">
                            </div>
                        </div>

                        <div class="mb-3" id="buktiContainer" style="display: none;">
                            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                            <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*" required>
                        </div>

                        <!-- Total / Sisa Bayar -->
                        <div class="d-flex justify-content-between">
                            <span>Total Bayar : <strong class="text-danger" id="totalBayar">Rp 0</strong></span>
                            <span>Sisa Bayar : <strong class="text-danger" id="sisaBayar">Rp 0</strong></span>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer border-0 justify-content-between">
                        <button type="button" class="btn btn-secondary" onclick="closeModal()">Kembali</button>
                        <button type="submit" class="btn btn-pink">Simpan Booking</button>
                    </div>
                </div>
            </form>
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
        function tampilkanModalTambahJadwal() {
            var modal = new bootstrap.Modal(document.getElementById('modalTambahJadwal'));
            modal.show();
        }

        function tutupModalTambahJadwal() {
            var modalElement = document.getElementById('modalTambahJadwal');
            var modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (modalInstance) {
                modalInstance.hide();
            }
        }
    </script>

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
  <script>
let treatmentIndex = 1;

// Update harga otomatis dari select
function updateHarga(selectElem) {
    const selected = selectElem.options[selectElem.selectedIndex];
    const harga = selected.getAttribute('data-harga') || 0;
    const hargaInput = selectElem.closest('.treatment-item').querySelector('.harga-input');
    hargaInput.value = harga;
    updateTotal();
}

// Tambah treatment baru
document.getElementById('btnAddTreatment').addEventListener('click', function () {
    const container = document.getElementById('treatments-area');

    const html = `
    <div class="row mb-2 treatment-item">
        <div class="col-md-6">
            <select name="treatments[${treatmentIndex}][id_treatment]" class="form-select treatment-select" onchange="updateHarga(this)">
                <option value="">-- Pilih Treatment --</option>
                @foreach ($treatments as $t)
                    <option value="{{ $t->id_treatment }}" data-harga="{{ $t->harga }}">
                        {{ $t->nama_treatment }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <input type="number" name="treatments[${treatmentIndex}][harga]" class="form-control harga-input" readonly>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger w-100 btn-remove-treatment">✕</button>
        </div>
    </div>`;
    container.insertAdjacentHTML('beforeend', html);
    treatmentIndex++;
});

// Hapus treatment
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-remove-treatment')) {
        e.target.closest('.treatment-item').remove();
        updateTotal();
    }
});

// Update total bayar & sisa bayar
function updateTotal() {
    const hargaInputs = document.querySelectorAll('.harga-input');
    let total = 0;
    hargaInputs.forEach(input => {
        const val = parseInt(input.value) || 0;
        total += val;
    });
    document.getElementById('totalBayar').innerText = 'Rp ' + total.toLocaleString();

    const dp = parseInt(document.querySelector('input[name="dp"]').value) || 0;
    const sisa = Math.max(total - dp, 0);
    document.getElementById('sisaBayar').innerText = 'Rp ' + sisa.toLocaleString();
}

// Trigger total ulang saat DP berubah
document.querySelector('input[name="dp"]').addEventListener('input', updateTotal);
</script>
<script>
function toggleDPRequirement() {
  const metode = document.getElementById('metode_pembayaran').value;
  const dpInput = document.getElementById('dp');

  if (metode === 'cash') {
    dpInput.removeAttribute('required');
  } else {
    dpInput.setAttribute('required', 'required');
  }
}

// Jalankan saat halaman pertama kali dibuka juga
document.addEventListener('DOMContentLoaded', function() {
  toggleDPRequirement();
});
</script>
<script>
// document.getElementById('bookingForm').addEventListener('submit', function (e) {
//     const metode = document.getElementById('metode_pembayaran').value;
//     const dpInput = document.getElementById('dp');
//     const buktiInput = document.getElementById('bukti_pembayaran');

//     // Atur required sesuai metode
//     if (metode !== 'cash') {
//         dpInput.required = true;
//         buktiInput.required = true;
//     } else {
//         dpInput.required = false;
//         buktiInput.required = false;
//     }
// });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const metodeSelect = document.getElementById('metode_pembayaran');
    const buktiContainer = document.getElementById('buktiContainer');
    const buktiInput = document.getElementById('bukti_pembayaran');

    function toggleBukti() {
        const metode = metodeSelect.value;
        if (metode === 'cash') {
            buktiContainer.style.display = 'none';
            buktiInput.removeAttribute('required');
        } else {
            buktiContainer.style.display = 'block';
            buktiInput.setAttribute('required', 'required');
        }
    }

    // Trigger saat halaman pertama kali dimuat dan saat ganti metode
    metodeSelect.addEventListener('change', toggleBukti);
    toggleBukti();
});
</script>
<script>
    const dateInput = document.getElementById("selectedDate");
    const dateText = document.getElementById("selectedDateText");
    const bookedTimeSlots = document.getElementById("bookedTimeSlots");

    // Format tanggal ke gaya lokal (Indonesia)
    function formatTanggalIndonesia(tanggal) {
        const options = { weekday: 'long', day: '2-digit', month: 'short', year: 'numeric' };
        return new Date(tanggal).toLocaleDateString('id-ID', options);
    }

    function fetchJamBooking(tanggal) {
        fetch(`/jadwal-terisi/${tanggal}`)
            .then(response => response.json())
            .then(data => {
                bookedTimeSlots.innerHTML = ''; // Kosongkan slot sebelumnya

                if (data.length === 0) {
                    bookedTimeSlots.innerHTML = '<span class="text-muted">Belum ada booking.</span>';
                    return;
                }

                data.forEach(item => {
                    const btn = document.createElement('button');
                    btn.className = 'btn btn-outline-primary';
                    btn.innerText = item.jam_booking;
                    bookedTimeSlots.appendChild(btn);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                bookedTimeSlots.innerHTML = '<span class="text-danger">Gagal memuat data.</span>';
            });
    }

    // Event: saat tanggal diubah
    dateInput.addEventListener('change', function () {
        const tanggal = this.value;
        dateText.innerText = formatTanggalIndonesia(tanggal);
        fetchJamBooking(tanggal);
    });

    // Load awal saat halaman pertama kali tampil
    window.addEventListener('DOMContentLoaded', function () {
        fetchJamBooking(dateInput.value);
    });
</script>


@endsection
