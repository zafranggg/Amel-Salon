@extends('layout.app')
  
@section('title', 'Treatment Salon')

@section('content')

@section('nama')
<script src="https://cdn.tailwindcss.com"></script>
<h3 class="text-2xl text-gray-800 m-4">Treatment Salon</h3>

<div class="max-w-7xl mx-auto">
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
    <h1 class="text-4xl font-bold text-center text-pink-700 mb-12">💖 Daftar Lengkap Treatment Salon</h1>
    <button class="btn btn-success mb-4" onclick="openAddTreatmentModal()">+ Tambah Treatment</button>
    <button class="btn btn-outline-primary mb-4" data-bs-toggle="modal" data-bs-target="#filterModal">
    🔍 Filter Treatment
    </button>

    <div class="grid md:grid-cols-2 gap-8">
      @foreach ($treatments as $treatment)
        <div class="bg-white border border-pink-300 shadow-xl rounded-2xl overflow-hidden">
            <!-- Gambar & info lainnya bisa pakai switch-case berdasarkan kategori -->
            <div class="p-6">
            <h2 class="text-xl font-bold text-rose-600">{{ $treatment->kategori }}</h2>
            <p class="text-gray-700">{{ $treatment->nama_treatment }}</p>
            <p class="text-gray-500 text-sm">Durasi: {{ $treatment->durasi }}</p>
            <p class="text-gray-700 font-semibold">Rp {{ number_format($treatment->harga, 0, ',', '.') }}</p>

            <div class="mt-4 flex space-x-3">
                <button type="button" class="btn btn-warning btn-sm"
                    data-bs-toggle="modal"
                    onclick='openEditTreatmentModal(@json($treatment))'>
                    Edit
                </button>
                <form action="{{ route('treatment.destroy', $treatment->id_treatment) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus treatment ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Tambah/Edit Treatment -->
<div class="modal fade" id="treatmentModal" tabindex="-1" aria-labelledby="treatmentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="{{route('treatment.store') }}"id="treatmentForm">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="treatmentModalLabel">Tambah Treatment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="modal_kategori" class="form-control">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($kategoriList as $kategori)
                        <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
          </div>

          <div class="mb-3">
            <label for="nama_treatment" class="form-label">Nama Treatment</label>
            <input type="text" class="form-control" id="modal_nama_treatment" name="nama_treatment" required>
          </div>

          <div class="mb-3">
            <label for="durasi" class="form-label">Durasi</label>
            <input type="text" class="form-control" id="modal_durasi" name="durasi" required>
          </div>

          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="modal_harga" name="harga" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Treatment -->
<div class="modal fade" id="editTreatmentModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" id="editTreatmentForm" action="{{ route('treatment.update', $treatment->id_treatment) }}">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Treatment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" class="form-control">
              @foreach ($kategoriList as $kategori)
                <option value="{{ $kategori }}" {{ $kategori == $treatment->kategori ? 'selected' : '' }}>
                    {{ $kategori }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="nama_treatment" class="form-label">Nama Treatment</label>
            <input type="text" name="nama_treatment" class="form-control" value="{{ $treatment->nama_treatment }}" required>
          </div>

          <div class="mb-3">
            <label for="durasi" class="form-label">Durasi</label>
            <input type="text" name="durasi" class="form-control" value="{{ $treatment->durasi }}" required>
          </div>

          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $treatment->harga }}" required>
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Modal Filter -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="GET" action="{{ route('treatment.index') }}">
        <div class="modal-header">
          <h5 class="modal-title" id="filterModalLabel">Filter Treatment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-control">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($kategoriList as $kategori)
                        <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
          </div>
          <div class="mb-3">
            <label for="harga_min" class="form-label">Harga Minimal</label>
            <input type="number" name="harga_min" id="harga_min" class="form-control" value="{{ request('harga_min') }}">
          </div>
          <div class="mb-3">
            <label for="harga_max" class="form-label">Harga Maksimal</label>
            <input type="number" name="harga_max" id="harga_max" class="form-control" value="{{ request('harga_max') }}">
          </div>
        </div>
        <div class="modal-footer">
          <a href="{{ route('treatment.index') }}" class="btn btn-secondary">Reset</a>
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
<script>
function openAddTreatmentModal() {
    document.getElementById('treatmentForm').reset();
    document.getElementById('treatmentModalLabel').innerText = 'Tambah Treatment';
    document.getElementById('treatmentForm').action = '{{ route('treatment.store') }}';
    document.getElementById('formMethod').value = 'POST';

    const modal = new bootstrap.Modal(document.getElementById('treatmentModal'));
    modal.show();
}

function openEditTreatmentModal(treatment) {
    // Set action form (ubah ke id_treatment)
    const form = document.getElementById('editTreatmentForm');
    form.action = '/treatment/' + treatment.id_treatment;

    // Isi field dengan data treatment
    form.querySelector('select[name="kategori"]').value = treatment.kategori;
    form.querySelector('input[name="nama_treatment"]').value = treatment.nama_treatment;
    form.querySelector('input[name="durasi"]').value = treatment.durasi;
    form.querySelector('input[name="harga"]').value = treatment.harga;

    // Tampilkan modal
    const modal = new bootstrap.Modal(document.getElementById('editTreatmentModal'));
    modal.show();
}
</script>
@endsection
