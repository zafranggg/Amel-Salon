@extends('layout.app')
@section('title', 'Tranksaksi pembayaran')
@section('content')
@section('nama')
    <h3 class="mt-4">Transaksi Pembayaran</h3>

@endsection

<!-- Main content -->
<div class="card-info">
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
    <h5 class="text-center text-danger fw-bold">Daftar Transaksi Pembayaran</h5>
    <p class="text-center">Lihat seluruh riwayat pembayaran pelanggan di salon.</p>

    <!-- Total Lunas 
    <div class="card-purple mb-3 d-flex justify-content-between align-items-center">
        <div><i class="bi bi-cash-coin"></i> <strong>Total Pembayaran Lunas :</strong></div>
        <h5 class="text-end text-primary mb-0">Rp 1.300.000</h5>
    </div> -->

    <!-- Tombol Tambah Transaksi -->
    <div class="text-end mb-3">
        <button class="btn btn-pink btn-sm btn-detail" onclick="openTransaksiModal()">
            <i class="bi bi-plus-lg"></i> Tambah Transaksi
        </button>
    </div>

    <!-- Tabs -->
    @include('layout.tabs')

    <!-- Total 
    <div class="card-purple mb-3 p-3 d-flex justify-content-between align-items-center"
        style="background-color: rgba(25, 135, 84, 0.5);">
        <div><i class="bi bi-cash-coin"></i> <strong>Total Pembayaran Lunas :</strong></div>
        <h5 class="text-end  mb-0">Rp 1.300.000</h5>
    </div>-->


    <!-- Table -->
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal</th>
              <th>Metode</th>
              <th>Total Bayar</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
      @forelse ($transaksi as $i => $trx)
        <tr>
          <td>{{ $i + 1 }}</td>
          <td>{{ $trx->pelanggan->nama_pelanggan ?? $trx->pelanggan_baru }}</td>
          <td>{{ \Carbon\Carbon::parse($trx->tanggal_transaksi)->format('d - m - Y') }}</td>
          <td>{{ ucfirst($trx->metode_pembayaran) }}</td>
          <td>Rp {{ number_format($trx->total_pembayaran, 0, ',', '.') }}</td>
          <td><span class="status-lunas">Lunas</span></td>
          <td>
            <button class="btn btn-sm btn-detail" onclick="tampilkanDetail({{ $trx->id_transaksi}})">Detail</button>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center">Belum ada transaksi</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content p-4">
      <div class="modal-header bg-pink text-white">
        <h5 class="modal-title" id="modalDetailLabel" style="color: black">Detail Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Akan diisi oleh JavaScript -->
        <div id="isiDetailTransaksi">
          <p><em>Memuat detail transaksi...</em></p>
        </div>
      </div>

      <
    </div>
  </div>
</div>

<!-- Modal Transaksi Pembayaran -->
<div class="modal " id="modalTransaksi">
  <div class="modal-dialog">
    <div class="modal-content p-4" style="background-color: white; width: 100%;">
      <div class="modal-header border-0">
        <h5 class="modal-title w-100 text-center text-pink fw-bold" id="modalTransaksiLabel">
          <i class="bi bi-plus-circle"></i> Tambah Transaksi Pembayaran
        </h5>
        <button type="button" class="btn-close" onclick="tutupModal()"></button>
      </div>
      <div class="modal-body">

      <form action="{{ route('transaksi.store') }}" method="POST" id="formTransaksi" class="card-info mx-auto" style="max-width: 700px;">
        @csrf
          <div class="mb-3">
          <label class="form-label"><i class="bi bi-person"></i> Cari Nama Pelanggan</label>
          <input type="text" id="namaPelanggan" name="nama_pelanggan" class="form-control" placeholder="Masukkan Nama Pelanggan Terdaftar...">
          <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="pelanggan_baru" value="1" id="pelangganBaru">
            <label class="form-check-label" for="pelanggan_baru">Tambahkan Pelanggan Baru (Belum Punya Akun)</label>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control">
          </div>
          <div class="col-md-6">
            <label class="form-label">Metode Pembayaran</label>
            <select id="metodePembayaran" name="metode_pembayaran" class="form-select">
              <option value="">Pilih Metode</option>
              <option value="cash">Cash</option>
              <option value="transfer">Transfer</option>
              <option value="qris">QRIS</option>
            </select>
          </div>
        </div>

        <div class="mb-3">
        <label class="form-label"><i class="bi bi-scissors"></i> Pilih Treatment</label>
        <div class="d-flex gap-2">
          <select id="treatmentSelect" class="form-select" onchange="updateHarga()">
          <option value="">-- Pilih Treatment --</option>
          @foreach ($treatments as $t)
            <option value="{{ $t->id_treatment }}" data-harga="{{ $t->harga }}">
              {{ $t->nama_treatment }}
            </option>
          @endforeach
          </select>
          <input type="number" id="harga" class="form-control" placeholder="Harga" style="width: 130px;" readonly>
          <button type="button" class="btn btn-success" onclick="tambahTreatment()"><i class="bi bi-plus-lg"></i></button>
        </div>
        </div>


        <ul id="daftarTreatment" class="list-group mb-3"></ul>
        <div class="d-flex justify-content-end align-items-center mb-3">
          <strong class="me-2 text-success">
            <i class="bi bi-cash-coin"></i> Total Bayar:
          </strong>
          <span id="totalBayar" class="fw-bold text-primary">Rp 0</span>
          <input type="hidden" name="total_pembayaran" id="totalPembayaranInput" value="0">
        </div>

        <div class="mb-3">
          <label class="form-label"><i class="bi bi-cash"></i> Uang Dibayar Pelanggan</label>
          <input type="number" name="uang_dibayar" id="uangDibayar" class="form-control" placeholder="Masukkan nominal uang dibayar..." min="0">
        </div>


        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-secondary" onclick="tutupModal()"><i class="bi bi-arrow-left"></i> Kembali</button>
          <button type="submit" class="btn btn-pink"><i class="bi bi-save"></i> Simpan Transaksi</button>
        </div>
      </form>
    </div>
  </div>
</div>




<script>
    function openDetailModal() {
        document.getElementById("modalDetail").style.display = "block";
    }

    function openTransaksiModal() {
        document.getElementById("modalTransaksi").style.display = "block";
    }

    function tutupModal() {
        document.getElementById("modalTransaksi").style.display = "none";
    }


    // Tutup modal jika klik di luar
    window.onclick = function(event) {
        const modalTransaksi = document.getElementById("modalTransaksi");
        const modalDetail = document.getElementById("modalDetail");
        if (event.target === modalDetail) {
            modalDetail.style.display = "none";
        }
        if (event.target === modalTransaksi) {
            modalTransaksi.style.display = "none";
        }

    }
</script>
<script>
  let treatmentIndex = 0;

  function updateHarga() {
    const select = document.getElementById('treatmentSelect');
    const selectedOption = select.options[select.selectedIndex];
    const harga = selectedOption.getAttribute('data-harga');
    document.getElementById('harga').value = harga;
  }

  function tambahTreatment() {
  const select = document.getElementById('treatmentSelect');
  const hargaInput = document.getElementById('harga');
  const daftarTreatment = document.getElementById('daftarTreatment');
  const totalBayar = document.getElementById('totalBayar');
  const totalInput = document.getElementById('totalPembayaranInput');

  const selectedOption = select.options[select.selectedIndex];
  const nama = selectedOption.text;
  const id = select.value;
  const harga = parseInt(hargaInput.value);

  if (!id || isNaN(harga)) {
    alert("Pilih treatment dan pastikan harga valid.");
    return;
  }

  const index = daftarTreatment.children.length;

  const item = document.createElement('li');
  item.className = 'list-group-item d-flex justify-content-between';
  item.innerHTML = `
    <span>${nama}</span>
    <span>Rp ${harga.toLocaleString()}</span>
    <input type="hidden" name="treatments[${index}][id_treatment]" value="${id}">
    <input type="hidden" name="treatments[${index}][nama]" value="${nama}">
    <input type="hidden" name="treatments[${index}][harga]" value="${harga}">
  `;
  daftarTreatment.appendChild(item);

  // Update total bayar
  const currentTotal = parseInt(totalInput.value || "0");
  const newTotal = currentTotal + harga;
  totalBayar.innerText = 'Rp ' + newTotal.toLocaleString();
  totalInput.value = newTotal;

  // Reset
  select.selectedIndex = 0;
  hargaInput.value = '';
}
</script>
<script>
function tampilkanDetail(id) {
  fetch(`/transaksi/${id}/detail`)
    .then(res => {
      if (!res.ok) {
        return res.text().then(text => { throw new Error(`${res.status} – ${text}`) });
      }
      return res.json();
    })
    .then(data => {
      // Bangun HTML list treatment
      const listHTML = data.treatments.map(t =>
        `<li>${t.nama} – Rp ${parseInt(t.harga).toLocaleString()}</li>`
      ).join('');

      // Isi modal
      document.querySelector('#modalDetailLabel').innerText = 'Detail Transaksi #' + id;
      document.querySelector('#modalDetail .modal-body').innerHTML = `
        <p><strong>Nama Pelanggan:</strong> ${data.nama_pelanggan}</p>
        <p><strong>Tanggal Transaksi:</strong> ${data.tanggal}</p>
        <p><strong>Metode Pembayaran:</strong> ${data.metode}</p>
        <hr>
        <p><strong>Treatment yang Dipilih:</strong></p>
        <ul id="listTreatments">
          ${listHTML}
        </ul>
        <hr>
        <p><strong>Subtotal:</strong> Rp ${parseInt(data.total).toLocaleString()}</p>
        <p><strong>Uang Dibayar:</strong> Rp ${parseInt(data.uang_dibayar).toLocaleString()}</p>
        <p><strong>Kembalian:</strong> Rp ${parseInt(data.kembalian).toLocaleString()}</p>
        <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <a href="/transaksi/${id}/struk" target="_blank" class="btn btn-primary">
          Cetak Struk
        </a>
        </div>
        </div>
      `;

      // Tampilkan modal
      new bootstrap.Modal(document.getElementById('modalDetail')).show();
    })
    .catch(err => {
      console.error('Error:', err);
      alert('Gagal mengambil detail transaksi: ' + err.message);
    });
}

function closeModal() {
  bootstrap.Modal.getInstance(document.getElementById('modalDetail')).hide();

}

</script>

@endsection
