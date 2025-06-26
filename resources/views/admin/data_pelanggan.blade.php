@extends('layout.app')
@section('content')    

        <!-- Modal Tambah Pelanggan -->


        @section('nama')            
        <h3 class="mt-4">Data Pelanggan</h3>
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
        <button class="btn-tambah" onclick="openModal()" style="margin-left: 40px;">
          Tambah Pelanggan
        </button>
        @endsection

        

        <table class="table mt-3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Pelanggan</th>
              <th>Email</th>
              <th>No. HP</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pelanggans as $index => $pelanggan)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $pelanggan->nama_pelanggan }}</td>
              <td>{{ $pelanggan->email ?? '-' }}</td>
              <td>{{ $pelanggan->no_hp ?? '-' }}</td>
              <td>
                @php
                  // Misalnya pelanggan yang punya 2+ booking dianggap pelanggan lama
                  $status = $pelanggan->bookings->count() >= 4 ? 'Lama' : 'Baru';
                @endphp
                <span class="badge-{{ strtolower($status) }}">{{ $status }}</span>
              </td>
              <td>
                <a href="{{ route('pelanggan.detail', $pelanggan->id_pelanggan) }}" style="text-decoration: none;" class="btn-detail">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

@endsection


<!-- ... kode HTML sebelumnya tetap ... -->

<!-- Modal Tambah Pelanggan -->
<div class="modal" id="modalTambahPelanggan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 100%">
      <form id="formTambahPelanggan" action="{{ route('pelanggan.store') }}" method="POST">
      @csrf
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="modalTambahPelangganLabel">Tambah Pelanggan Baru di Salon Kita!</h5>
          <button type="button" class="btn-close" onclick="closeModal()"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" required>
          </div>
          <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="xxxxx1234@gmail.com" required>
          </div>
          <div class="col-md-6">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" placeholder="nama123" required>
          </div>
          <div class="col-md-6">
              <label class="form-label">Tanggal pelanggan ditambahkan</label>
              <input type="date" name="dibuat" class="form-control" required>
          </div>
          <div class="col-md-6">
              <label class="form-label">No. HP</label>
              <input type="text" name="no_hp" class="form-control" placeholder="08....." required>
          </div>

          <div class="col-md-6">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="masukan password"required>
          </div>
          <div class="col-md-6">
              <label class="form-label">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" placeholder="konfirmasi password" required>
          </div>
        </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary w-100">Tambah</button>
              <button type="button" class="btn btn-secondary w-100" onclick="closeModal()" data-bs-dismiss="modal">Batal</button>
          </div>
      </form>
    </div>
  </div>
</div>


<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script Tambah Pelanggan -->
<script>
  function openModal() {
    document.getElementById("modalTambahPelanggan").style.display = "block";
  }

  function closeModal() {
    document.getElementById("modalTambahPelanggan").style.display = "none";
  }

  // Tutup modal jika klik di luar
  window.onclick = function(event) {
    const modalTransaksi = document.getElementById("modalTambahPelanggan");

    if (event.target === modalTransaksi) {
      modalTransaksi.style.display = "none";
    }
  }
</script>

</body>
</html>

