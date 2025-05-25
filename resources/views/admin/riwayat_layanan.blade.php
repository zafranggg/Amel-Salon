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
        <h3 class="mt-4">Riwayat Layanan</h3>

        <div class="card-wrapper">

        <!-- Tabs -->
        <div class="tabs">
          <button class="tab active">Riwayat Treatment</button>
          <button class="tab">Riwayat Booking</button>
        </div>

        <!-- Card Horizontal Scroll -->
        <div class="card-container">
          <div class="card">
            <img src="img/facial.jpg" alt="Facial Glow Up">
            <h4>Facial Glow Up</h4>
            <p>Total: 5 Pelanggan</p>
            <a href="#">Selengkapnya...</a>
          </div>
          <div class="card">
            <img src="img/hairstylist.jpg" alt="Hair Stylist">
            <h4>Hair Stylist</h4>
            <p>Total: 10 Pelanggan</p>
            <a href="#">Selengkapnya...</a>
          </div>
          <div class="card">
            <img src="img/facial.jpg" alt="Facial Glow Up">
            <h4>Facial Glow Up</h4>
            <p>Total: 5 Pelanggan</p>
            <a href="#">Selengkapnya...</a>
          </div>
          <div class="card">
            <img src="img/hairstylist.jpg" alt="Hair Stylist">
            <h4>Hair Stylist</h4>
            <p>Total: 10 Pelanggan</p>
            <a href="#">Selengkapnya...</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

</body>
</html>

