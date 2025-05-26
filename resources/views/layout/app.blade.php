@php
    $title = 'Amel Salon';

    if (request()->is('riwayat_layanan')) {
        $title = 'Riwayat Layanan';
    }
    elseif (request()->is('riwayat_booking')) {
        $title = 'Riwayat Booking';
    } elseif (request()->is('selangkap_riwayat_tr')) {
        $title = 'Selengkap';
    } elseif (request()->is('data_pelanggan')) {
        $title = 'Data Pelanggan';
    }
    elseif (request()->is('detail_pelanggan')) {
        $title = 'Detail Pelanggan';
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>{{ $title }} - Amel Salon</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@include('layout.style') 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
</style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
@include('layout.sidebar') 
      

      <!-- Main Content -->
      <div class="col-md-10">
@include('layout.topbar') 
        @yield('nama')

    @yield('content')
      </div>
      </div>
      </div>
      


</body>
</html>

