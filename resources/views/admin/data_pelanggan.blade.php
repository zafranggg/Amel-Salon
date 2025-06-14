@extends('layout.app')
@section('content')    

        <!-- Modal Tambah Pelanggan -->
<div class="modal fade" id="modalTambahPelanggan" tabindex="-1" aria-labelledby="modalTambahPelangganLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="modalTambahPelangganLabel">Tambah Pelanggan Baru di Salon Kita!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" placeholder="Anisa Wardani Fatimah">
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="anisawardani1234@gmail.com">
          </div>
          <div class="col-md-6">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Anisaw123">
          </div>
          <div class="col-md-6">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" value="2001-12-12">
          </div>
          <div class="col-md-6">
            <label class="form-label">No. HP</label>
            <input type="text" class="form-control" placeholder="082345678912">
          </div>
          <div class="col-md-6">
            <label class="form-label d-block">Jenis Kelamin</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="laki" checked>
              <label class="form-check-label" for="laki">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="perempuan">
              <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="e.g. @AduDh7aPd9ik">
          </div>
          <div class="col-md-6">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" placeholder="e.g. @AduDh7aPd9ik">
          </div>
          <div class="col-12">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" rows="2" placeholder="Blok X21 Kost Andra, Pemukiman Permata Indah, Mendalo Jambi"></textarea>
          </div>
          <div class="col-12">
            <label class="form-label">Catatan Khusus</label>
            <textarea class="form-control" rows="2" placeholder="Contoh: customer suka layanan X, alergi bahan Y, dsb."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100">Tambah</button>
          <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

        @section('nama')            
        <h3 class="mt-4">Data Pelanggan</h3>
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
            <tr>
              <td>1</td>
              <td>Fatimah Zara</td>
              <td>fatimah000@gmail.com</td>
              <td>0888666666</td>
              <td><span class="badge-lama">Lama</span></td>
              <td><a href="{{ url('/detail_pelanggan') }}" style="text-decoration: none;" class="btn-detail">Detail</a></td>
            </tr>
          </tbody>
        </table>
@endsection


<!-- ... kode HTML sebelumnya tetap ... -->

<!-- Modal Tambah Pelanggan -->
<div class="modal" id="modalTambahPelanggan">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width: 100%">
      <form id="formTambahPelanggan"> <!-- ID DITAMBAHKAN -->
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="modalTambahPelangganLabel">Tambah Pelanggan Baru di Salon Kita!</h5>
          <button type="button" class="btn-close" onclick="closeModal()"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" id="nama" class="form-control" placeholder="Anisa Wardani Fatimah"> <!-- ID DITAMBAHKAN -->
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" id="email" class="form-control" placeholder="anisawardani1234@gmail.com"> <!-- ID DITAMBAHKAN -->
          </div>
          <div class="col-md-6">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Anisaw123">
          </div>
          <div class="col-md-6">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" value="2001-12-12">
          </div>
          <div class="col-md-6">
            <label class="form-label">No. HP</label>
            <input type="text" id="nohp" class="form-control" placeholder="082345678912"> <!-- ID DITAMBAHKAN -->
          </div>
          <div class="col-md-6">
            <label class="form-label">Jenis Kelamin</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="laki" value="Laki-laki" checked>
              <label class="form-check-label" for="laki">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan">
              <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="e.g. @AduDh7aPd9ik">
          </div>
          <div class="col-md-6">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" placeholder="e.g. @AduDh7aPd9ik">
          </div>
          <div class="col-12">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" rows="2" placeholder="Blok X21 Kost Andra, Pemukiman Permata Indah, Mendalo Jambi"></textarea>
          </div>
          <div class="col-12">
            <label class="form-label">Catatan Khusus</label>
            <textarea class="form-control" rows="2" placeholder="Contoh: customer suka layanan X, alergi bahan Y, dsb."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100" >Tambah</button>
          <button type="button" class="btn btn-secondary w-100" onclick="closeModal()">Batal</button>
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
<script>
  document.getElementById('formTambahPelanggan').addEventListener('submit', function (e) {
    e.preventDefault();

    // Ambil data dari form
    const nama = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const nohp = document.getElementById('nohp').value;
    const status = document.getElementById('status').value;

    // Validasi sederhana
    if (!nama || !email || !nohp || !status) {
      alert('Harap lengkapi semua kolom!');
      return;
    }

    // Tentukan label status
    const badgeClass = status === 'Lama' ? 'badge-lama' : 'badge-baru';

    // Ambil jumlah baris untuk penomoran
    const tabelBody = document.getElementById('tabelPelanggan');
    const nomor = tabelBody.rows.length + 1;

    // Buat baris baru
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td>${nomor}</td>
      <td>${nama}</td>
      <td>${email}</td>
      <td>${nohp}</td>
      <td><span class="${badgeClass}">${status}</span></td>
      <td><button class="btn-detail">Detail</button></td>
    `;

    // Tambahkan baris ke tabel
    tabelBody.appendChild(newRow);

    // Reset form dan tutup modal
    this.reset();
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalTambahPelanggan'));
    modal.hide();
  });
</script>
</body>
</html>

