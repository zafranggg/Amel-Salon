<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Detail Pelanggan - Amel Salon</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@include('layout.style') 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
@include('layout.sidebar') 
      

      <!-- Main Content -->
      <div class="col-md-10">
@include('layout.topbar') 
        <h3 class="mt-4">Detail</h3>

<div class="detail-container">
      <div class="detail-box">
        <h3>Detail Pelanggan</h3>
        <div class="detail-grid">
          <div class="left">
            <p><span>Nama :</span> Anisa Wulandari Fatimah</p>
            <p><span>No. HP :</span> 082345678912</p>
            <p><span>Tanggal Lahir :</span> 12 Januari 2001</p>
            <p><span>Tanggal Daftar :</span> 01 Mei 2025</p>
            <p><span>Treatment Terakhir :</span> Smoothing - 02 Mei 2025</p>
            <p><span>Catatan Khusus :</span> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="right">
            <p><span>ID Pelanggan :</span> CUST00231</p>
            <p><span>Email :</span> anisawulandarifatimah234@gmail.com</p>
            <p><span>Status :</span> Pelanggan Baru</p>
            <p><span>Jumlah Treatment :</span> 3 Kali</p>
            <p><span>Alamat :</span> Blok Z23 Kost Audia, Perumahan Permata Indah, Mendalo Jauh</p>
          </div>
            <p><span>Catatan Khusus : <br></span> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

        </div>
        <button class="btn-delete">Hapus Pelanggan</button>
      </div>
    </div>
      </div>
      </div>
      </div>
</body>
</html>

