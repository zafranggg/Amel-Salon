@extends('layout.app')
@section('title', 'Treamtment Salon')
@section('content')

    @section('nama')
        <h3 class="mt-4 mb-4">Treatment Salon</h3>
        

        <!-- Tulisan di tengah di bawah tombol -->
        <div class="text-center mb-4">
            <h1 style="color: #6b0606"><strong>Service and Prices</strong></h1>
            <p style="max-width: 600px; margin: 0 auto; opacity: 50%;">
        Selamat datang di layanan terbaik kami. Kami menyediakan berbagai perawatan untuk rambut dan wajah Anda.
    </p>
        </div>

        <!-- Bagian dua kolom: kiri gambar, kanan price list -->
<div class="row justify-content-center align-items-start mt-5 mb-5 px-3">
    
    <!-- Gambar di sisi kiri -->
    <div class="col-md-6 text-center mb-5">
        <img src="{{ asset('assets/back.png') }}" 
             alt="Salon Treatment" 
             class="img-fluid rounded" 
             style="max-width: 100%; height: auto; opacity: 50%;">
    </div>

    <!-- Price list di sisi kanan -->
    <div class="col-md-6 mt-4" style="margin-top: 40px;">
    <h1 style="color: #6b0606">Make up</h1>
    <p style="max-width: 600px; margin: 0 auto; opacity: 50%; margin-top: 25px; margin-bottom: 15px;">
        Selamat datang di layanan terbaik kami.
    </p>
    <ul id="price-list" style="font-size: 18px; line-height: 2; list-style-type: none; padding-left: 0;">
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
    <li><strong>Daily make up</strong> <span style="opacity: 50%;">..................................................... from </span><span style="color: #6b0606">$35</span></li>
</ul>
<button id="toggle-btn" style="margin-top: 10px; background:none; border:none; padding:0; font:inherit; color:#6b0606; cursor:pointer; text-decoration:none;">
  View All
</button>

<script>
  const list = document.getElementById('price-list');
  const items = list.querySelectorAll('li');
  const btn = document.getElementById('toggle-btn');

  const defaultShowCount = 4;
  let expanded = false;

  function showItems(count) {
    items.forEach((item, index) => {
      item.style.display = (index < count) ? 'list-item' : 'none';
    });
  }

  // Awal tampil 4
  showItems(defaultShowCount);

  btn.addEventListener('click', () => {
    if (!expanded) {
      // Tampilkan semua
      showItems(items.length);
      btn.textContent = 'Hide';
      expanded = true;
    } else {
      // Kembali ke 4
      showItems(defaultShowCount);
      btn.textContent = 'View All';
      expanded = false;
    }
  });
</script>


</div>


</div>

    @endsection

@endsection
