@extends('layout.app')
@section('title', 'Bahan Baku')
@section('content')
@section('nama')
    <h3 class="mt-4">Detail Bahan Baku</h3>

@endsection
{{-- content --}}
<div class="mt-5 p-4" style="background-color: white; width: 50%; margin: 0 auto;">
    <h2 style="margin-left:25%">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/35/Logo_example.png" alt="Logo"
            style="height: 30px; vertical-align: middle;">
        <span class="fw-bold">Detail Pengeluaran</span>
    </h2>
    <div class="text-align-left">



        <p><strong>Tanggal:</strong> 2025-06-30</p>
        <p><strong>Keperluan:</strong> Pembelian Produk</p>
        <p><strong>Jumlah:</strong> Shampo</p>
        <p><strong>Bukti:</strong></p>
        <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/2/23/19f1cbe3-b5c7-4958-9364-7f45d8b2940f.jpg"
            alt="Shampoo" style="max-height: 200px; margin: 20px auto;">


        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="{{ url('/laporan_keuangan') }}"><button class="btn btn-primary">Tutup</button></a>
            <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')"
                style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahStokLabel"><img
                        src="https://img.icons8.com/color/24/edit--v1.png" alt="edit" style="margin-right: 5px;">

                    <span style="color: #c2185b;">Edit Bahan Baku Baru</span>
                </h5>
                <button type="button" class="close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Bahan:</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama bahan" value="Shampoo">
                    </div>

                    <div class="form-group">
                        <label>Jumlah awal:</label>
                        <input type="number" class="form-control" placeholder="Jumlah awal" value="20">
                    </div>

                    <div class="form-group">
                        <label>Minimum Stok:</label>
                        <input type="number" class="form-control" placeholder="Minimum stok" value="5">
                    </div>

                    <div class="form-group">
                        <label>Upload Gambar:</label>
                        <input type="file" class="form-control-file">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn" style="background-color: #ec407a; color: white; width: 100%;">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal Script -->
<script>
    function openModalEdit() {
        document.getElementById("modalEdit").style.display = "block";
    }

    function openModalStok() {
        document.getElementById("modalStok").style.display = "block";
    }

    function openModalPakai() {
        document.getElementById("modalPakai").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modalEdit").style.display = "none";
        document.getElementById("modalTambah").style.display = "none";
        document.getElementById("modalDetail2").style.display = "none";
    }

    window.onclick = function(event) {
        const modalEdit = document.getElementById("modalEdit");
        if (event.target === modalEdit) {
            modalEdit.style.display = "none";
        }
        const modalStok = document.getElementById("modalStok");
        if (event.target === modalStok) {
            modalStok.style.display = "none";
        }
        const modalPakai = document.getElementById("modalPakai");
        if (event.target === modalPakai) {
            modalPakai.style.display = "none";
        }
    }
</script>
@endsection
