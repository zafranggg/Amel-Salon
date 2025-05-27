@extends('layout.app')
@section('title', 'Riwayat Layanan')
@section('content')
    @section('nama')
        
        <h3 class="mt-4">Riwayat Layanan</h3>
    @endsection

        <div class="card-wrapper">

        <!-- Tabs -->
        <div class="tabs">
          <a href="{{ url('/riwayat_layanan') }}" style="text-decoration: none" class="tab active">Riwayat Treatment</a>
          <a href="{{ url('/riwayat_booking') }}" style="text-decoration: none" class="tab">Riwayat Booking</a>
        </div>

        <!-- Card Horizontal Scroll -->
        <div class="card-container">
          <div class="card">
            <img src="assets/salon.png" alt="Facial Glow Up">
            <h4>Facial Glow Up</h4>
            <p>Total: 5 Pelanggan</p>
            <a href="{{ url('selengkap_riwayat_tr') }}">Selengkapnya...</a>
          </div>
          <div class="card">
            <img src="assets/salon.png" alt="Hair Stylist">
            <h4>Hair Stylist</h4>
            <p>Total: 10 Pelanggan</p>
            <a href="#">Selengkapnya...</a>
          </div>
          <div class="card">
            <img src="assets/salon.png" alt="Facial Glow Up">
            <h4>Facial Glow Up</h4>
            <p>Total: 5 Pelanggan</p>
            <a href="#">Selengkapnya...</a>
          </div>
          <div class="card">
            <img src="assets/salon.png" alt="Hair Stylist">
            <h4>Hair Stylist</h4>
            <p>Total: 10 Pelanggan</p>
            <a href="#">Selengkapnya...</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection


