@extends('layout.app')
@section('title', 'Profil')
@section('content')
@section('nama')

@endsection
<div class="mt-3">
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
  </div>
{{-- content --}}
<div class="container d-flex justify-content-center">
    <div class="mt-5 p-4" style="background-color: white; width: 80%; border-radius: 15px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

        <!-- Header Profil -->
        <div style="background: linear-gradient(to right, #f83600, #b44593); border-radius: 15px 15px 0 0; padding: 20px; color: white; display: flex; align-items: center;">
          <div style="
                    width: 80px;
                    height: 80px;
                    border-radius: 50%;
                    border: 3px solid pink;
                    background-color: white;
                    overflow: hidden;
                    margin-right: 20px;
                ">
                    <img src="{{ $pelanggan->foto ? asset('storage/foto_pelanggan/'.$pelanggan->foto) : asset('assets/default.png') }}"
                      alt="Foto pelanggan"
                      style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            <div>
                <h4 style="margin: 0;">Profil pelanggan</h4>
                <small>{{ $pelanggan->email }}</small>
            </div>
        </div>
        <!-- Informasi Profil -->
        <div class="row mt-4">
          <div class="row mt-4">
                  <div class="col-md-4 mb-3">
                      <div class="p-3 rounded" style="background-color: #fce4ec;">
                          <span style="color: #f06292;">🧾 Nama Lengkap</span><br>
                          <strong>{{ $pelanggan->nama_pelanggan }}</strong>
                      </div>
                  </div>
                  <div class="col-md-4 mb-3">
                      <div class="p-3 rounded" style="background-color: #fce4ec;">
                          <span style="color: #5c6bc0;">📱 Nomor WhatsApp</span><br>
                          <strong>{{ $pelanggan->no_hp }}</strong>
                      </div>
                  </div>
                  <div class="col-md-4 mb-3">
                      <div class="p-3 rounded" style="background-color: #fce4ec;">
                          <span style="color: #2196f3;">📧 Email</span><br>
                          <strong>{{ $pelanggan->email }}</strong>
                      </div>
                  </div>
                  <div class="col-md-4 mb-3">
                      <div class="p-3 rounded" style="background-color: #fce4ec;">
                          <span style="color: #43a047;">✅ Status Akun</span><br>
                          <strong>{{ $pelanggan->status ?? 'Aktif' }}</strong>
                      </div>
                  </div>
                  <div class="col-md-4 mb-3">
                      <div class="p-3 rounded" style="background-color: #fce4ec;">
                          <span style="color: #ffb300;">🕒 Terakhir Login</span><br>
                          <strong>{{ \Carbon\Carbon::parse($pelanggan->last_login ?? now())->translatedFormat('d F Y') }}</strong>
                      </div>
                  </div>
              </div>
            </div>

        <!-- Tombol Edit -->
        <div class="text-center mt-4">
            <button class="btn" onclick="openModalTambah()" style="background-color: #ad1457; color: white; border-radius: 20px; padding: 10px 30px;">
                <i class="bi bi-pencil-fill"></i> Edit Profil
            </button>
        </div>
    </div>
</div>
<!-- Modal Edit Profil -->
<div class="modal" id="modalTambah">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="border-radius: 15px;">
      <div class="modal-header" style="border-bottom: none;">
        <h5 class="modal-title" id="editProfilModalLabel" style="color: #e91e63;">
          <i class="bi bi-pencil-fill"></i> Edit Profil
        </h5>
        <button type="button" class="btn-close" onclick="closeModal()"></button>
      </div>

  <form method="POST" action="{{ route('pelanggan.updateProfil') }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="modal-body">
    <div class="d-flex align-items-center mb-4">
      <div style="
          width: 80px;
          height: 80px;
          border-radius: 50%;
          border: 3px solid pink;
          background-color: white;
          overflow: hidden;
          margin-right: 20px;
      ">
          <img src="{{ $pelanggan->foto ? asset('storage/foto_pelanggan/'.$pelanggan->foto) : asset('assets/default.png') }}"
            alt="Foto pelanggan"
            style="width: 100%; height: 100%; object-fit: cover;">
      </div>

      <div>
        <strong>{{ $pelanggan->nama_pelanggan }}</strong><br>
        <small>{{ $pelanggan->email }}</small><br>
        <small class="text-muted">Terakhir login: {{ date('d M Y', strtotime($pelanggan->last_login ?? now())) }}</small>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Nama Lengkap</label>
      <input type="text" name="nama_pelanggan" class="form-control" value="{{ $pelanggan->nama_pelanggan }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{ $pelanggan->email }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Nomor WhatsApp</label>
      <input type="text" name="no_hp" class="form-control" value="{{ $pelanggan->no_hp }}">
    </div>
    <div class="mb-3">
      <label class="form-label">Ganti Foto Profil</label>
      <input type="file" name="foto" class="form-control"  value="{{ $pelanggan->foto }}">
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" onclick="closeModal()">Kembali</button>
    <button type="submit" class="btn text-white" style="background-color: #ff4081;">Simpan Perubahan</button>
  </div>
</form>
      </div>
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
