<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Amel Beauty Salon</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    html {
      scroll-behavior: smooth;
    }
    body {
      font-family: 'Quicksand', sans-serif;
      margin: 0;
      background: linear-gradient(to right, #ffe6f0, #ffffff);
      color: #333;
    }
    header {
      background: linear-gradient(to right, #ffffff 10%, #ffe0ef 40%, #ffb2db 80%);
      width: 100vw;
      max-width: 100%;
      min-height: 100vh;
      color: rgb(0, 0, 0);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      display: flex;
      align-items: center;
    }

    .hsatu {
      color:#ff1493;
    }
    .intro-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 40px;
      max-width: 1100px;
      margin: auto;
      text-align: left;
    }
    .intro-text {
      flex: 1;
      min-width: 280px;
    }
    .intro-text h1 {
      font-size: 3em;
      margin: 0 0 10px;
    }
    .intro-text p {
      font-size: 1.1em;
      margin-bottom: 10px;
    }
    .intro-img {
      flex: 1;
      min-width: 250px;
    }
    .intro-img img {
      max-width: 100%;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    nav {
      position: sticky;
      top: 0;
      background-color: #ff1493;
      padding: 12px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 1000;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      flex-wrap: wrap;
    }
    nav a {
      color: white;
      font-weight: bold;
      text-decoration: none;
      margin: 8px 15px;
      font-size: 1em;
      transition: transform 0.3s, color 0.3s;
    }
    nav a:hover {
      color: #fffacd;
      transform: scale(1.05);
    }
    .container {
      padding: 30px 20px;
      max-width: 1100px;
      margin: auto;
    }
    section {
      background: white;
      padding: 30px;
      margin: 30px 0;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(255, 105, 180, 0.2);
    }
    h2 {
      color: #ff1493;
      font-size: 1.8em;
      margin-bottom: 20px;
    }
    .btn-selengkapnya {
      background-color: #ff1493;
      color: white;
      padding: 10px 14px;
      text-align: center;
      border: none;
      border-radius: 10px;
      margin-top: 12px;
      font-size: 0.9em;
      text-decoration: none;
      display: inline-block;
      transition: background 0.3s, transform 0.2s;
    }
    .btn-selengkapnya:hover {
      background-color: #d61c83;
      transform: scale(1.03);
    }
    footer {
      background: linear-gradient(90deg, #ff69b4, #ff1493);
      text-align: center;
      color: white;
      padding: 35px 20px;
      font-size: 1em;
      margin-top: 60px;
    }
    .contact-info {
      margin-top: 15px;
      line-height: 1.8;
    }
    @media (max-width: 768px) {
      nav {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }
      nav a {
        width: 100%;
        text-align: left;
      }
      .intro-wrapper {
        flex-direction: column;
        text-align: center;
      }
      .intro-text, .intro-img {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <nav>
    <div class="nav-links">
      <a href="#">Beranda</a>
      <a href="#layanan">Layanan</a>
      <a href="#paket">Paket Spesial</a>
      <a href="#lowongan">Lowongan</a>
      <a href="#kontak">Kontak</a>
    </div>
    <div class="auth-links">
      <a href="{{ url('/login') }}">Login</a>
      <a href="{{ url('/daftar') }}">Daftar</a>
    </div>
  </nav>

  <header style="width: 100vw; max-width: 100%; min-height: 100vh;">
  <div class="intro-wrapper" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 40px; padding: 40px 20px; max-width: 1300px; margin: auto;">
    <div class="intro-text" style="flex: 1; min-width: 280px;">
      <h1 class="hsatu" style="font-size: 5em; margin-bottom: 10px;"><strong>Amel Beauty Salon</strong></h1>
      <p style="font-weight: bold; font-size: 1.1em; margin-bottom: 10px;">Perawatan Kecantikan Profesional untuk Penampilan Terbaikmu</p>
      <p style="font-size: 1.1em; line-height: 1.6;">
        Kami adalah salon kecantikan berpengalaman yang menghadirkan berbagai layanan facial, hair treatment,
        nail art, hingga paket khusus pernikahan. Dengan tim profesional, kami berkomitmen memberikan pelayanan
        terbaik dan kenyamanan bagi setiap pelanggan.
      </p>
    </div>
    <div class="intro-img" style="flex: 1; min-width: 250px;">
      <img src="assets/gambar/halamanutama.jpeg" alt="Amel Salon Image"
        style="width: 100%; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); object-fit: cover;" />
    </div>
  </div>
</header>


  <!-- Layanan & Link Selengkapnya -->
  <section id="layanan" class="container">
    <br>

    <h2 class="text-3xl font-bold text-center text-pink-700 mb-8">Daftar Treatment & Layanan</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-white border border-pink-300 shadow-xl rounded-2xl overflow-hidden">
        <img src="assets/gambar/potong.png" class="w-full h-48 object-contain bg-pink-50 p-4" alt="Potong Rambut">
        <div class="p-6">
          <h2 class="text-2xl font-bold text-rose-600 mb-4">✂️ Paketan Potong Rambut</h2>
          <ul class="list-disc ml-5 text-gray-700 space-y-1">
            <li>Potong - 40K</li>
            <li>Potong Poni - 20K</li>
            <li>Potong + Cuci - 85K</li>
            <li>Potong + Catok - 80K</li>
            <li>Potong + Cuci + Catok - 95K</li>
          </ul>
        </div>
      </div>
      <div class="bg-white border border-pink-300 shadow-xl rounded-2xl overflow-hidden">
        <img src="assets/gambar/catokblow.png" class="w-full h-48 object-contain bg-pink-50 p-4" alt="Hair Styling">
        <div class="p-6">
          <h2 class="text-2xl font-bold text-rose-600 mb-4">💆‍♀️ Cuci Catok/Catok/Hair Styling</h2>
          <p class="italic text-sm text-gray-500 mb-2">Paket Cuci Catok (cuci 2x shampoo, conditioner, styling, VIT, Hair Spray)</p>
          <p class="italic text-sm text-gray-500 mb-2">Paket Catok (styling, Hair VIT, Hair vitamin)</p>
          <ul class="list-disc ml-5 text-gray-700 space-y-1">
            <li>Cuci Catok Blow - 50K</li>
            <li>Cuci Catok Curly - 60K</li>
            <li>Catok Blow - 35K</li>
            <li>Catok Curly - 40K</li>
            <li>Cuci Kering - 30K</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center mt-8">
      <a href="{{ route('treatmentPelanggan.index') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">Lihat Selengkapnya</a>
    </div>
  </section>

  <!-- Paket Spesial -->
  <section id="paket" class="container">
    <br>

    <h2 class="text-3xl font-bold text-center text-pink-700 mb-8">🎁 Paket Spesial</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-white border border-pink-300 shadow-xl rounded-2xl p-6">
        <img src="assets/gambar/catokblow.png" alt="Paket Barbie Glow" class="w-full h-48 object-cover rounded mb-4">
        <h3 class="text-xl font-semibold text-rose-600 mb-2">✨ Paket Creambath</h3>
        <p class="text-gray-700">1. CULT FRUTTY - 95K</p>
        <p class="text-gray-700">2. MATRIX - 110K</p>
        <p class="text-gray-700">3. ANTI DANDRUF - 120K</p>
        <p class="text-gray-700">4. LOREAL - 130K</p>
      </div>
      <div class="bg-white border border-pink-300 shadow-xl rounded-2xl p-6">
        <img src="assets/gambar/boddymassage.png" alt="Paket Barbie Glow" class="w-full h-48 object-cover rounded mb-4">
        <h3 class="text-xl font-semibold text-rose-600 mb-2">💍 Paket Bride-to-be</h3>
        <p class="text-gray-700">Paket khusus calon pengantin dengan diskon 20%</p>
      </div>
    </div>
  </section>

  <!-- Lowongan -->
  <section id="lowongan" class="container">
    <br>
 
    <h2 class="text-3xl font-bold text-center text-pink-700 mb-8">📢 Lowongan Pekerjaan</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-white border border-pink-300 shadow-xl rounded-2xl overflow-hidden">
        <img src="assets/gambar/naileyelas.png" class="w-full h-48 object-cover bg-pink-50" alt="Therapist">
        <div class="p-6">
          <h3 class="text-xl font-bold text-rose-600 mb-2">Beautician (Eyelash, nail art)</h3>
          <p class="text-gray-700 mb-4">Kriteria: Wanita, Siap di kontrak 1 tahun, Berpengalaman, Niat Kerja</p>
          {{-- <a href="selengkapnyahu.html" class="btn-selengkapnya">Selengkapnya</a> --}}
        </div>
      </div>
      <div class="bg-white border border-pink-300 shadow-xl rounded-2xl overflow-hidden">
        <img src="assets/gambar/catokblow.png" class="w-full h-48 object-cover bg-pink-50" alt="Hair Stylist">
        <div class="p-6">
          <h3 class="text-xl font-bold text-rose-600 mb-2">Hair Stylist</h3>
          <p class="text-gray-700 mb-4">Kriteria: Ahli styling & coloring, minimal 2 tahun pengalaman.</p>
          {{-- <a href="selengkapnyahu.html" class="btn-selengkapnya">Selengkapnya</a> --}}
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="kontak">
    <p><strong>Amel Beauty Salon</strong></p>
    <div class="contact-info">
      📍 Alamat: Jl. Jambi-Muara Bulian, KM 14, RT 01, Mendalo Darat, Muaro Jambi, Jambi 36361<br>
      📞 Telepon: 0853-6693-9694<br>
      📸 Instagram: amel_beautysalon_ <br>
      ✉️ Email: info@amelbeautysalon.com<br>
      🕒 Jam Operasional: Setiap Hari, 10.00 - 20.00
    </div><br><br>
    <p style="margin-top: 10px;">&copy; 2025 Amel Beauty Salon. Hak Cipta Dilindungi.</p>
  </footer>
</body>
</html>
