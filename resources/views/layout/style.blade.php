  <style>
    body {
  background-color: #fcf4f5;
  font-family: 'Abhaya Libre', serif;
  width: 100%;
  
}
h3 {
  margin-left: 40px;
}
   
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 240px;
      background-color: #f8f9fa;
      transition: width 0.3s ease;
      z-index: 1000;
    }

    .sidebar.sidebar-collapsed {
      width: 70px;
    }

    .sidebar .link-text {
      display: inline;
      transition: opacity 0.3s ease;
    }

    .sidebar.sidebar-collapsed .link-text {
      display: none;
    }

    .main-content {
      margin-left: 240px;
      transition: margin-left 0.3s ease;
    }

    .main-content.collapsed {
      margin-left: 70px;
    }
  .footer-links a {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
    color: #333;
    text-decoration: none;
  }

  .footer-links a:hover {
    color: #000;
  }

    .dashboard-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(255, 92, 179, 0.15);
      padding: 20px;
      text-align: left;
      position: relative;
      border-bottom: 4px solid transparent;
      border-image: linear-gradient(to right, #ff3399, #ff99cc) 1;
    }

    .dashboard-card h6 {
      color: #ff5cb3;
      font-weight: 600;
      font-size: 14px;
    }

    .dashboard-card p {
      font-size: 24px;
      font-weight: bold;
      margin-top: 10px;
      color: #000;
    }

    .dashboard-card .icon {
      float: right;
      background-color: #ffe6f0;
      padding: 10px;
      border-radius: 12px;
      font-size: 22px;
      color: #ff3399;
    }

    .reminder-box {
      background: white;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(255, 92, 179, 0.15);
      padding: 20px;
      border-bottom: 4px solid transparent;
      border-image: linear-gradient(to right, #ff3399, #ff99cc) 1;
    }

    .reminder-box h6 {
      color: #ff5cb3;
      font-weight: 600;
    }

    .brand {
      color: #ff5cb3;
      font-weight: bold;
      font-size: 20px;
      padding-bottom: 20px;
    }

    .footer-links a {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-top: 15px;
      color: #000;
      font-size: 14px;
      text-decoration: none;
    }

    .footer-links a:hover {
      text-decoration: underline;
    }

    .search-bar {
      background-color: #f5f5f5;
      border-radius: 20px;
      padding: 8px 16px;
      width: 300px;
    }

    .search-bar input {
      border: none;
      background: transparent;
      outline: none;
      width: 100%;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: white;
      border-bottom: 1px solid #eee;
      width: 100%;
    }

    .section-title {
      font-size: 24px;
      font-weight: 700;
      margin-top: 20px;
      margin-bottom: 10px;
      color: #000;
      text-align: left;
    }

    .welcome-text {
      text-align: center;
      font-size: 1.5rem;
      font-weight: bold;
      color: #ff3399;
    }
  </style>

  {{-- data pelanggan --}}
    <style>

    .sidebar {
      background-color: white;
      min-height: 100vh;
      padding: 20px 10px;
      border-right: 1px solid #eee;
    }

    .sidebar .nav-link {
      color: #000;
      margin-bottom: 10px;
      font-weight: 500;
    }

    .sidebar .nav-link.active {
      background-color: #ff5cb3;
      color: white;
      border-radius: 10px;
    }

    .brand {
      color: #ff5cb3;
      font-weight: bold;
      font-size: 20px;
      padding-bottom: 20px;
    }

    .footer-links a {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-top: 15px;
      color: #000;
      font-size: 14px;
      text-decoration: none;
    }

    .footer-links a:hover {
      text-decoration: underline;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: white;
      border-bottom: 1px solid #eee;
    }
    .profile {
  display: flex;
  align-items: center;
  gap: 10px; /* jarak antara foto dan teks */
}

.profile-photo {
  width: 40px;  /* ukuran foto, bisa disesuaikan */
  height: 40px;
  border-radius: 50%; /* bikin foto jadi bulat */
  object-fit: cover; /* agar foto proporsional */
}

.profile-text {
  line-height: 1.2;
}


    .search-bar {
      background-color: #f5f5f5;
      border-radius: 20px;
      padding: 8px 16px;
      width: 300px;
    }

    .search-bar input {
      border: none;
      background: transparent;
      outline: none;
      width: 100%;
    }

    .btn-tambah {
      background-color: #ff5cb3;
      color: white;
      border: none;
      padding: 8px 16px;
      margin-bottom: 10px;
      border-radius: 8px;
    }

    table {
  background: white;
  border-collapse: collapse;
  width: 100%;
  table-layout: fixed;
}

th, td {
  border: 1px solid #ff99cc;
  text-align: center;
  vertical-align: middle;
  font-size: 14px;
  padding: 6px 8px;

  /* Tambahan agar isi menyusut ke bawah dan tidak melampaui batas */
  word-wrap: break-word;
  word-break: break-word;
  overflow-wrap: break-word;
  overflow: hidden;
}

/* Tentukan lebar kolom */
th:nth-child(1), td:nth-child(1) {
  width: 40px; /* No. */
} 
/*
th:nth-child(2), td:nth-child(2) {
  width: 150px; /* Nama 
}
th:nth-child(3), td:nth-child(3) {
  width: 50%; /* Email 
}
th:nth-child(4), td:nth-child(4) {
  width: 130px; /* No HP }
th:nth-child(5), td:nth-child(5) {
  width: 50%; /* Status 
}
th:nth-child(6), td:nth-child(5) {
  width: 25%; /* Status 
}
th:nth-child(7), td:nth-child(6) {
  width:30%; /* Aksi 
}

*/



    .badge-lama {
      background-color: #ff9999;
      color: white;
      padding: 5px 12px;
      border-radius: 10px;
      font-size: 14px;
    }

    .badge-baru {
      background-color: #99ffcc;
      color: black;
      padding: 5px 12px;
      border-radius: 10px;
      font-size: 14px;
    }

    .btn-detail {
      background-color: #d63384;
      color: white;
      border: none;
      padding: 5px 12px;
      border-radius: 6px;
      font-size: 14px;
    }

    
  </style>
  
  {{-- detail pelanggan --}}
  <style>
    .detail-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 80vh;
}



    /* Header */
    .content {
      flex: 1;
      padding: 30px;
    }



    /* Detail Box */
    .detail-box {
      margin-top: 10px;
      margin-bottom: 40px;
      background: #fff0f5;
  background-color: white;

      border: 2px solid #ffb6c1;
      padding: 60px;
      border-radius: 30px;
      max-width: 900px;
    }

    .detail-box h3 {
      text-align: center;
      color: #ff007f;
      margin-bottom: 30px;
    }

    .detail-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .detail-grid .left, .detail-grid .right {
      width: 48%;
    }

    .detail-grid p {
      margin-bottom: 12px;
    }

    .detail-grid span {
      font-weight: bold;
      color: #ff007f;
    }

    .btn-delete {
      background: red;
      color: #fff;
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      margin-top: 30px;
      display: block;
      margin-left: auto;
      margin-right: auto;
      cursor: pointer;
    }

    .btn-delete:hover {
      background: darkred;
    }
  </style>

  {{-- riwayat layanan --}}
<style>
    .card-wrapper {
    margin-top: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.card-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* 2 kartu per baris */
    gap: 80px 300px; /* Jarak antar kartu: 80px vertikal, 100px horizontal */
    padding-bottom: 50px;
    scroll-behavior: smooth;
    justify-items: center;
}

.card-container::-webkit-scrollbar {
    height: 8px;
}

.card-container::-webkit-scrollbar-thumb {
    background-color: #ff55b3;
    border-radius: 10px;
}

.card {
    width: 220px;
    background: #fff;
    padding: 15px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-5px);
}

.card img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

.card h4 {
    margin-bottom: 5px;
    color: #333;
}

.card p {
    color: #666;
    margin-bottom: 10px;
}

.card a {
    color: #ff55b3;
    text-decoration: none;
    font-weight: 500;
}

.card a:hover {
    text-decoration: underline;
}

.tabs {
    width: 100%;
    max-width: 1000px; /* batasi panjang maksimum agar tidak terlalu panjang */
    margin: 0 auto; /* ini yang membuatnya berada di tengah */
    display: flex;
    justify-content: center; /* bisa juga pakai 'space-between' atau 'flex-start' */
    gap: 50px;
    margin-bottom: 40px;
    flex-wrap: nowrap;
    background-color: white;
    overflow-x: auto;
    padding: 20px;
    border-radius: 12px;
}


.tab {
    padding: 10px 20px;
    border: 2px solid #ff55b3;
    background-color: #fff;
    color: #ff55b3;
    border-radius: 12px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
}

.tab.active,
.tab:hover {
    background-color: #ff55b3;
    color: #fff;
}

/* Responsif: 1 kartu per baris jika layar kecil */
@media (max-width: 600px) {
    .card-container {
        grid-template-columns: 1fr;
    }
}
.btn-detail {
      background-color: #ff4dc4;
      color: white;
      border-radius: 15px;
    }
    .card-info {
      border: 1px solid #ffd1f0;
      border-radius: 20px;
      padding: 20px;
    }
    .card-purple {
      background-color: #e4d7ff;
      border-radius: 10px;
      padding: 10px 20px;
    }
    .tab-icon {
      font-size: 1.2rem;
      margin-right: 6px;
    }
    .search-bar-top input {
      border-radius: 20px;
      padding-left: 35px;
    }
    .search-bar-top {
      position: relative;
      width: 300px;
    }
    .search-bar-top .bi-search {
      position: absolute;
      top: 10px;
      left: 12px;
      color: #aaa;
    }

</style>