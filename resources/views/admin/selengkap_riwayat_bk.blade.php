@extends('layout.app')
@section('content')
@section('nama')
        <h3 class="mt-4">Selengkapnya...</h3>
@endsection
        <div class="detail-container">
      <div class="detail-box">
        <h3>Riwayat Pelanggan - [Nama Pelanggan]</h3>
        <table class="table mt-3">
          <thead>
            <tr style="background-color: #ff5cb3; color: white">
              <th>No.</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal Booking</th>
              <th>Layanan</th>
              <th>Jam</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Fatimah Zara</td>
              <td>23 Februari 2025</td>
              <td>Facial Glow up</td>
              <td>10.00 Wib</td>
              <td><button class="btn btn-success btn-sm">Hadir</button></td>
              <td><button onclick="openModal()" style="text-decoration: none;" class="btn-detail">Detail</button></td>
            </tr>
            
            {{-- <tr><td>3</td><td colspan="5"></td></tr>
            <tr><td>4</td><td colspan="5"></td></tr>
            <tr><td>5</td><td colspan="5"></td></tr> --}}
          </tbody>
        </table>
        
      </div>
    </div>

      </div>
      </div>
      </div>
      <!-- Modal -->
<div id="treatmentModal" class="modal">
  <div class="modal-content">
    <span class="close-button" onclick="closeModal()">&times;</span>
    <h2>Facial Glow Up</h2>
    <p><strong>Tanggal:</strong> 26 Februari 2025</p>
    <p><strong>Durasi:</strong> 60 Menit</p>
    <p><strong>Beautician:</strong> Alisa Ananda</p>
    <p><strong>Deskripsi:</strong> Membersihkan wajah, scrubbing, masker collagen</p>
    <p><strong>Biaya:</strong> Rp 150.000</p>
  </div>
</div>
<script>
function openModal() {
  document.getElementById("treatmentModal").style.display = "block";
}

function closeModal() {
  document.getElementById("treatmentModal").style.display = "none";
}

// Tutup modal jika user klik di luar konten
window.onclick = function(event) {
  const modal = document.getElementById("treatmentModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
@endsection
