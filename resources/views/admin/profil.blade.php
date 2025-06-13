@extends('layout.app')
@section('title', 'Profil')
@section('content')
@section('nama')
    <h3 class="mt-4">Profil</h3>

@endsection
{{-- content --}}
<div class="container d-flex justify-content-center">
    <div class="mt-5 p-4" style="background-color: white; width: 80%; border-radius: 15px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

        <!-- Header Profil -->
        <div style="background: linear-gradient(to right, #f83600, #b44593); border-radius: 15px 15px 0 0; padding: 20px; color: white; display: flex; align-items: center;">
            <div style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid white; margin-right: 20px; display: flex; align-items: center; justify-content: center; background-color: white; color: black; font-weight: bold;">
                Foto Admin
            </div>
            <div>
                <h4 style="margin: 0;">Profil Admin</h4>
                <small>admin@saloncantikku.com</small>
            </div>
        </div>

        <!-- Informasi Profil -->
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <div style="background-color: #fce4ec; padding: 15px; border-radius: 10px;">
                    <span style="color: #f06292; font-size: 14px;">🧾 Nama Lengkap</span><br>
                    <strong>Nama Admin</strong>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div style="background-color: #fce4ec; padding: 15px; border-radius: 10px;">
                    <span style="color: #5c6bc0; font-size: 14px;">📱 Nomor WhatsApp</span><br>
                    <strong>081234567890</strong>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div style="background-color: #fce4ec; padding: 15px; border-radius: 10px;">
                    <span style="color: #2196f3; font-size: 14px;">📧 Email</span><br>
                    <strong>admin@saloncantikku.com</strong>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div style="background-color: #fce4ec; padding: 15px; border-radius: 10px;">
                    <span style="color: #43a047; font-size: 14px;">✅ Status Akun</span><br>
                    <strong>Aktif</strong>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div style="background-color: #fce4ec; padding: 15px; border-radius: 10px;">
                    <span style="color: #ffb300; font-size: 14px;">🕒 Terakhir Login</span><br>
                    <strong>08 Juni 2025</strong>
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

      <div class="modal-body">
        <div class="d-flex align-items-center mb-4">
          <div style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid pink; background-color: white; display: flex; justify-content: center; align-items: center; margin-right: 20px;">
            Foto Admin
          </div>
          <div>
            <strong>Nama Admin</strong><br>
            <small>admin@saloncantikku.com</small><br>
            <small class="text-muted">Terakhir login: 01 Juni 2025</small>
          </div>
        </div>

        <form>
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" value="Amelia Fransiska">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="amelbeautysalon@gmail.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Nomor WhatsApp</label>
            <input type="text" class="form-control" value="082222222222">
          </div>
          <div class="mb-3">
            <label class="form-label">Ganti Foto Profil</label>
            <input type="file" class="form-control">
          </div>
        </form>
      </div>

      <div class="modal-footer" style="border-top: none;">
        <button type="button" class="btn btn-secondary" onclick="closeModal()"> 
          <i class="bi bi-arrow-left-circle"></i> Kembali
        </button>
        <button type="button" class="btn" style="background-color: #ff4081; color: white;">
          <i class="bi bi-save-fill"></i> Simpan Perubahan
        </button>
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
