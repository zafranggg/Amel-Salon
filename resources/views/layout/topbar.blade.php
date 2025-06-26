<div class="topbar flex justify-between items-center p-4 bg-white shadow">
  <div>
    <!-- Tombol toggle sidebar -->

  </div> <!-- Bisa diisi menu atau kosong -->
  

  <div class="profile flex items-center gap-3">
    <img src="{{ asset('assets/salon.png') }}" alt="Profile" class="profile-photo w-10 h-10 rounded-full" />
    <div class="profile-text text-sm leading-tight">
    <strong>{{ Auth::user()->nama_admin ?? Auth::user()->nama_pelanggan ?? 'Guest' }}</strong><br />
      <small>{{ Auth::user()->role ?? 'Unknown Role' }}</small>
    </div>
  </div>
</div>
