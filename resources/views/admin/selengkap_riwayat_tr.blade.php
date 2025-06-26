@extends('layout.app')
@section('style')
    <style>
    /* Modal Background */
    .modal {
  display: none; 
  position: fixed; 
  z-index: 999; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgba(0,0,0,0.4); 
    }

  /* Modal Content Box */
  .modal-content {
    background-color: #ffe6f0;
    margin: 10% auto; 
    padding: 20px;
    border: 1px solid #ff99cc;
    width: 50%;
    border-radius: 20px;
    font-family: 'Arial', sans-serif;
    position: relative;
  }

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
  </style>
@endsection
@section('content')
@section('nama')
        <h3 class="mt-4">Selengkapnya...</h3>
@endsection
        <div class="detail-container">
      <div class="detail-box">
        <h3>Riwayat Treatment - Facial Glow Up</h3>
        <table class="table mt-3">
          <thead>
            <tr style="background-color: #ff5cb3; color: white">
              <th>No.</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal</th>
              <th>Nama Treatment</th>
              <th>Beautician</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Fatimah Zara</td>
              <td>23 Februari 2025</td>
              <td>Facial Glow up</td>
              <td>Alissa Ananda</td>
              <td><button onclick="openModal()" style="text-decoration: none;" class="btn-detail">Detail</button></td>
            </tr>
            <tr>
              <td>1</td>
              <td>Fatimah Zara</td>
              <td>23 Februari 2025</td>
              <td>Facial Glow up</td>
              <td>Alissa Ananda</td>
              <td><button onclick="openModal()" style="text-decoration: none;" class="btn-detail">Detail</button></td>
            </tr>
            <tr><td>3</td><td colspan="5"></td></tr>
            <tr><td>4</td><td colspan="5"></td></tr>
            <tr><td>5</td><td colspan="5"></td></tr>
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
