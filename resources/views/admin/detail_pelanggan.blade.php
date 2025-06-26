@extends('layout.app')
@section('content')
    @section('nama')
        <h3 class="mt-4">Detail</h3>
        <div class="container">
            {{-- Flash Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
@endsection
<div class="detail-container" >
      <div class="detail-box">
        <button type="button" class="btn btn-secondary mb-3" onclick="goBack()">
  <i class="bi bi-arrow-left"></i> 
</button>
        <h3>Detail Pelanggan</h3>
        <div class="detail-grid">
          <div class="left">
            <p><span>Nama :</span> {{ $pelanggan->nama_pelanggan }}</p>
            <p><span>No. HP :</span> {{ $pelanggan->no_hp }}</p>
            <p><span>Tanggal Lahir :</span> {{ \Carbon\Carbon::parse($pelanggan->tanggal_lahir)->format('d M Y') }}</p>
            <p><span>Tanggal Daftar :</span> {{ \Carbon\Carbon::parse($pelanggan->created_at)->format('d M Y') }}</p>
            <p><span>Catatan Khusus :</span> {{ $pelanggan->catatan_khusus ?? '-' }}</p>
          </div>
          <div class="right">
            <p><span>Email :</span> {{ $pelanggan->email }}</p>
            <p><span>Status :</span> {{ $pelanggan->bookings->count() >= 4 ? 'Pelanggan Lama' : 'Pelanggan Baru' }}</p>
            <p><span>Jumlah Treatment :</span> {{ $pelanggan->bookings->count() }} Kali</p>
            <p><span>Alamat :</span> {{ $pelanggan->alamat }}</p>
          </div>
            @php
              $lastBooking = $pelanggan->bookings->sortByDesc('tanggal_booking')->first();
            @endphp
            <p><span>Treatment Terakhir :</span> 
              {{ $lastBooking ? $lastBooking->treatments->pluck('nama_treatment')->implode(', ') . ' - ' . \Carbon\Carbon::parse($lastBooking->tanggal_booking)->format('d M Y') : '-' }}
            </p>
        </div>
        <form action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Hapus Pelanggan</button>
        </form>
        
      </div>
    </div>
      </div>
      </div>
      </div>
<script>
  function goBack() {
    window.history.back();
  }
</script>
@endsection