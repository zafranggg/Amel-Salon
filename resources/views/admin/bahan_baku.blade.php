@extends('layout.app')
@section('title', 'Bahan Baku')
@section('content')
@section('nama')
<h3 class="mt-4">Bahan Baku</h3>
@endsection

<div class="container mt-4">
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

    <div class="text-center mb-4">
        <h2><span class="text-pink-600">🌸 Manajemen Bahan Baku Salon</span></h2>
    </div>

    <div class="d-flex justify-content-center gap-3 mb-3">
        <button class="btn btn-pink" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <span class="badge bg-danger me-1">New</span>Tambah Bahan Baku Baru
        </button>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalStok">+ Tambah Stok Bahan</button>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalPakai">− Pakai Bahan</button>
        {{-- <a class="btn btn-primary" href="{{ url('/riwayat_baku') }}">📜 Riwayat</a> --}}
    </div>

    <!-- Tabel Bahan Baku -->
    <div id="contentLangsung" class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>🖼️ Gambar</th>
                    <th>🧴 Bahan Baku</th>
                    <th>📦 Stok</th>
                    <th>📉 Minimum</th>
                    <th>✅ Status</th>
                    <th>🛠️ Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bahanList as $index => $bahan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($bahan->gambar)
                        <img src="{{ asset('storage/' . $bahan->gambar) }}" alt="{{ $bahan->nama_bahan }}" width="40">
                        @else
                        <span>-</span>
                        @endif
                    </td>
                    <td>{{ $bahan->nama_bahan }}</td>
                    <td>{{ $bahan->jumlah }}</td>
                    <td>{{ $bahan->minimum_stok }}</td>
                    <td>
                        @if($bahan->jumlah <= $bahan->minimum_stok)
                        <span class="badge bg-danger">Kritis</span>
                        @else
                        <span class="badge bg-success">Aman</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/detail_baku/' . $bahan->id) }}" class="btn btn-sm btn-detail">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @if(count($bahanList) == 0)
                <tr><td colspan="7" class="text-center">Data belum tersedia</td></tr>
            @endif
        </table>
    </div>
</div>

<!-- Modal Tambah Bahan Baku -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('bahan.store') }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title text-pink-600">
                    <img src="https://img.icons8.com/color/24/000000/new--v1.png" alt="new" class="me-2">
                    Tambah Bahan Baku Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama Bahan:</label>
                    <input type="text" name="nama_bahan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jumlah Awal:</label>
                    <input type="number" name="jumlah_awal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Minimum Stok:</label>
                    <input type="number" name="minimum_stok" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Upload Gambar:</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-pink w-100">Tambah Bahan Baru</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Tambah Stok Bahan -->
<div class="modal fade" id="modalStok" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('bahan.tambahStok') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title text-success">Tambah Stok Bahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama Bahan:</label>
                    <select name="id_bahan" class="form-control">
                        @foreach ($bahanList as $bahan)
                        <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jumlah Tambahan:</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success w-100">Tambah Stok</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Pakai Bahan -->
<div class="modal fade" id="modalPakai" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('bahan.pakai') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title text-danger">Pakai Bahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama Bahan:</label>
                    <select name="id_bahan" class="form-control">
                        @foreach ($bahanList as $bahan)
                        <option value="{{ $bahan->id }}">{{ $bahan->nama_bahan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jumlah Digunakan:</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger w-100">Kurangi Stok</button>
            </div>
        </form>
    </div>
</div>
@endsection
