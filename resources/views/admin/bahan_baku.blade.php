@extends('layout.app')
@section('title', 'Bahan Baku')
@section('content')
@section('nama')
    <h3 class="mt-4">Bahan Baku</h3>

@endsection
<div class="container mt-4">
    <div class="text-center mb-4">
        <h2><span class="text-pink-600">🌸 Manajemen Bahan Baku Salon</span></h2>
    </div>

    <div class="d-flex justify-content-center gap-3 mb-3">
        <button class="btn btn-pink" onclick="openModalTambah()"><span class="badge bg-danger me-1">New</span>Tambah Bahan
            Baku Baru</button>
        <button class="btn btn-success"  onclick="openModalStok()">+ Tambah Stok Bahan</button>
        <button class="btn btn-danger" onclick="openModalPakai()">− Pakai Bahan</button>
        <a class="btn btn-primary" href="{{ url('/riwayat_baku') }}">📜 Riwayat</a>
    </div>

    <!-- Tabel Pembayaran Langsung -->
    <div id="contentLangsung" class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th> <!-- Nomor urut -->
                    <th>🖼️ Gambar</th> <!-- Gambar bahan -->
                    <th>🧴 Bahan Baku</th> <!-- Botol lotion/shampoo -->
                    <th>📦 Stok</th> <!-- Kotak/stok barang -->
                    <th>📉 Minimum</th> <!-- Minimum (indikator batas bawah) -->
                    <th>✅ Status</th> <!-- Status stok (aman/kritis) -->
                    <th>🛠️ Aksi</th> <!-- Tombol tindakan -->
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><img src="{{ asset('images/conditioner.png') }}" alt="Conditioner Shampoo" width="40"></td>
                    <td>Conditioner Shampoo</td>
                    <td>25</td>
                    <td>5</td>
                    <td><span class="badge bg-success">Aman</span></td>
                    <td><a href="{{ url('/detail_baku') }}"><button class="btn btn-sm btn-detail">Detail</button></a></td>
                </tr>
            </tbody>

        </table>
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
                    <span style="color: #c2185b;">Tambah Bahan Baku Baru</span>
                </h5>
                <button type="button" class="close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Bahan:</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama bahan" value="Shampoo">
                    </div>

                    <div class="form-group">
                        <label>Jumlah awal:</label>
                        <input type="number" class="form-control" placeholder="Jumlah awal" value="20">
                    </div>

                    <div class="form-group">
                        <label>Minimum Stok:</label>
                        <input type="number" class="form-control" placeholder="Minimum stok" value="5">
                    </div>

                    <div class="form-group">
                        <label>Upload Gambar:</label>
                        <input type="file" class="form-control-file">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn" style="background-color: #ec407a; color: white; width: 100%;">
                        Tambah Bahan Baru
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="modalStok">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header text-center d-block">
        <h5 class="modal-title w-100" id="modalTambahStokLabel">
          <span style="font-size: 18px;">
            <img src="https://img.icons8.com/ios-filled/24/000000/plus.png" alt="plus" style="margin-right: 5px;">
            <span style="color: #c2185b;">Tambah Stok Bahan</span>
          </span>
        </h5>
      </div>

      <form>
        <div class="modal-body">

          <div class="form-group">
            <label for="bahan">Nama Bahan:</label>
            <select class="form-control" id="bahan">
              <option selected>Shampoo</option>
              <option>Conditioner Shampoo</option>
            </select>
          </div>

          <div class="form-group">
            <label for="jumlah">Jumlah Tambahan:</label>
            <input type="number" class="form-control" id="jumlah" value="5">
          </div>

        </div>

        <div class="modal-footer d-block">
          <button type="submit" class="btn btn-success btn-block" style="background-color: #28a745;">
            Tambah Stok
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal" id="modalPakai">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header text-center d-block">
        <h5 class="modal-title w-100" id="modalTambahStokLabel">
          <span style="font-size: 18px;">
            <img src="https://img.icons8.com/ios-filled/24/000000/minus.png" alt="plus" style="margin-right: 5px;">
            <span style="color: #c2185b;">Pakai Bahan</span>
          </span>
        </h5>
      </div>

      <form>
        <div class="modal-body">

          <div class="form-group">
            <label for="bahan">Nama Bahan:</label>
            <select class="form-control" id="bahan">
              <option selected>Shampoo</option>
              <option>Conditioner Shampoo</option>
            </select>
          </div>

          <div class="form-group">
            <label for="jumlah">Jumlah Tambahan:</label>
            <input type="number" class="form-control" id="jumlah" value="5">
          </div>

        </div>

        <div class="modal-footer d-block">
          <button type="submit" class="btn btn-danger btn-block">
            Kurangi Stok
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
@endsection
{{--  --}}
