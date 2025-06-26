@extends('layout.app')
@section('title', 'Laporan')
@section('content')
@section('nama')
    <h3 class="mt-4">Laporan keuangan</h3>

@endsection
{{-- content --}}
<div class="container mt-4 p-4" style="border: 2px solid hotpink; border-radius: 15px;">
    <h3 class="text-center" style="color: hotpink;">
        {{-- <img src="https://icons8.com/icon/ShL9XvK5RNbg/money-with-wings" alt="icon"
            style="width: 32px; margin-bottom: 5px;"> --}}
        <strong>Laporan Keuangan Salon</strong>
    </h3>
    <p class="text-center text-muted">Ringkasan uang masuk dan keluar dari kegiatan operasional salon.</p>

    <div class="row text-center mt-4 mb-4">
        <div class="col-md-4 mb-3">
            <div class="p-3 rounded" style="background-color: #d4f9d4;">
                <p>💰 <strong>Total Uang Masuk:</strong></p>
                <h4 class="text-success fw-bold">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</h4>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="p-3 rounded" style="background-color: #fbdada;">
                <p>📌 <strong>Total Uang Keluar:</strong></p>
                <h4 class="text-danger fw-bold">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</h4>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="p-3 rounded" style="background-color: #dceaff;">
                <p>💼 <strong>Saldo Bersih:</strong></p>
                <h4 class="text-primary fw-bold">Rp {{ number_format($saldoBersih, 0, ',', '.') }}</h4>
            </div>
        </div>
    </div>


    <!-- Tabs -->
    <ul class="nav nav-tabs mb-3" id="riwayatTabs">
        <li class="nav-item">
            <a class="nav-link active" id="tabMasuk" href="#" onclick="showTab('masuk')">
                <i class="bi bi-cash-stack tab-icon"></i> Uang Masuk
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tabKeluar" href="#" onclick="showTab('keluar')">
                <i class="bi bi-cash-stack tab-icon"    ></i> Uang Keluar
            </a>
        </li>
    </ul>



    <!-- Conditional Table -->
    <!-- Tabel Pembayaran Langsung -->
    <div id="contentMasuk" class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Nota</th>
                    <th>Sumber</th>
                    <th>Nama Pelanggan</th>
                    <th>Total Bayar</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uangMasuk as $index => $masuk)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($masuk->tanggal)->format('d - m - Y') }}</td>
                    <td>{{ $masuk->id_transaksi }}</td>
                    <td>{{ !empty($masuk->id_booking) ? 'Booking' : 'Pembayaran Langsung' }}</td>
                    <td>{{ $masuk->pelanggan->nama_pelanggan ?? $masuk->pelanggan_baru }}</td>
                    <td>Rp {{ number_format($masuk->total_pembayaran, 0, ',', '.') }}</td>
                    <td>selesai</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tabel Pembayaran Langsung -->
    <div id="contentKeluar" class="table-responsive">
        <div class="d-flex justify-content-start mb-3">
            <button class="btn" onclick="openModalTambah()"
                style="background-color: #e53935; color: white; border-radius: 20px; padding: 8px 20px;">
                <i class="bi bi-plus-lg"></i> Tambah Pengeluaran
            </button>
            <a class="btn btn-primary" href="{{ url('/riwayat_keuangan') }}" class="btn"
                style="background-color: #8e24aa; color: white; border-radius: 20px; padding: 8px 20px;">
                {{-- <img src="https://img.icons8.com/emoji/20/clockwise-vertical-arrows-emoji.png" alt="icon"
                    style="margin-right: 5px;">  --}}
                    Riwayat
        </a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keperluan</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>07 - 02 - 2025</td>
                    <td>cuci gudang</td>
                    <td>9</td>
                    <td>Biar kuku bersih</td>
                    <td>foto</td>
                    <td><a href="{{ url('/detail_keuangan') }}"><button class="btn btn-sm btn-detail" onclick="openDetailModal2()">Detail</button></a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end mt-3 gap-2">
        <a href="#" class="btn btn-success"><i class="bi bi-file-earmark-excel"></i> Unduh Excel</a>
        <a href="#" class="btn btn-primary"><i class="bi bi-file-earmark-pdf"></i> Unduh PDF</a>
    </div>
</div>
<!-- Modal -->
<div class="modal" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahStokLabel">
                    <img src="https://img.icons8.com/color/24/000000/new--v1.png" alt="new"
                        style="margin-right: 5px;">
                    <span style="color: #c2185b;">Tambah Pengeluaran</span>
                </h5>
                <button type="button" class="close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Tanggal:</label>
                        <input type="date" class="form-control" placeholder="Masukkan nama bahan" value="Shampoo">
                    </div>
                    <div class="form-group">
                        <label>Keterangan:</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama bahan" value="Shampoo">
                    </div>
                    <div class="form-group">
                        <label>Keperluan:</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama bahan" value="Shampoo">
                    </div>

                    <div class="form-group">
                        <label>Jumlah(Rp) :</label>
                        <input type="number" class="form-control" placeholder="Jumlah awal" value="20">
                    </div>

                    <div class="form-group">
                        <label>Upload Bukti:</label>
                        <input type="file" class="form-control-file">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="" class="btn" onclick="closeModal()" style="background-color: #332127; color: white; width: 100%;">
                        Kembali
                    </button>
                    <button type="submit" class="btn" style="background-color: #ec407a; color: white; width: 100%;">
                        Tambah Pengeluaran
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal Script -->
<script>
    function openModalTambah() {
        document.getElementById("modalTambah").style.display = "block";
    }

    function openModalStok() {
        document.getElementById("modalStok").style.display = "block";
    }
    function openModalPakai() {
        document.getElementById("modalPakai").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modalTambah").style.display = "none";
        document.getElementById("modalTambah").style.display = "none";
        document.getElementById("modalDetail2").style.display = "none";
    }

    window.onclick = function(event) {
        const modalTambah = document.getElementById("modalTambah");
        if (event.target === modalTambah) {
            modalTambah.style.display = "none";
        }
        const modalStok = document.getElementById("modalStok");
        if (event.target === modalStok) {
            modalStok.style.display = "none";
        }
        const modalPakai = document.getElementById("modalPakai");
        if (event.target === modalPakai) {
            modalPakai.style.display = "none";
        }
    }
</script>
<script>
    function showTab(tab) {
        // Tab aktif
        document.getElementById('tabMasuk').classList.remove('active');
        document.getElementById('tabKeluar').classList.remove('active');

        // Konten
        document.getElementById('contentMasuk').style.display = 'none';
        document.getElementById('contentKeluar').style.display = 'none';

        if (tab === 'masuk') {
            document.getElementById('tabMasuk').classList.add('active');
            document.getElementById('contentMasuk').style.display = 'block';
        } else if (tab === 'keluar') {
            document.getElementById('tabKeluar').classList.add('active');
            document.getElementById('contentKeluar').style.display = 'block';
        }
    }
    // Tampilkan tab 'langsung' secara default saat halaman dimuat
    window.onload = function() {
        showTab('masuk');
    };
</script>
@endsection
