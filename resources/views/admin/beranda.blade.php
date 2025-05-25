<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Amel Salon - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@include('layout.style') 
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
@include('layout.sidebar') 
      

      <!-- Main Content -->
      <div class="col-md-10">
        <!-- Topbar with Search -->
@include('layout.topbar') 
        

        <div class="px-4">
          <h1 class="section-title">Beranda</h1>
          <div class="welcome-text mb-4">👋 Selamat Datang, Admin!</div>

          <div class="row g-3 mt-3">
            <div class="col-md-4">
              <div class="dashboard-card">
                <h6>Total Pelanggan</h6>
                <span class="icon">👥</span>
                <p>300</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="dashboard-card">
                <h6>Booking Hari Ini</h6>
                <span class="icon">📅</span>
                <p>5</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="dashboard-card">
                <h6>Stok Hampir Habis</h6>
                <span class="icon">⚠️</span>
                <p>3</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="dashboard-card">
                <h6>Pemasukan Bulan Ini</h6>
                <span class="icon">💰</span>
                <p>1,200</p>
              </div>
            </div>
          </div>

          <div class="reminder-box mt-4">
            <h6>🔔 Pengingat Hari Ini</h6>
            <ul>
              <li>Cek stok shampoo dan masker wajah.</li>
              <li>Konfirmasi ulang booking jam 14.00 dan 16.00.</li>
              <li>Update laporan keuangan mingguan.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
