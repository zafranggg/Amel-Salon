@extends('layout.app')
@section('title', 'Bahan Baku')
@section('content')
@section('nama')
    <h3 class="mt-4">Riwayat Bahan Baku</h3>

@endsection
{{-- content --}}
<div class="container mt-4 p-4" style="border: 2px solid hotpink; border-radius: 15px;">
    <h3 class="text-center mb-4" style="color: hotpink;">
        <img src="https://img.icons8.com/color/48/clock--v1.png" alt="clock" style="width: 30px; margin-bottom: 5px;">
        <strong>Riwayat Bahan Baku</strong>
    </h3>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Tambah Bahan Baru -->
        <div class="col">
            <div class="p-3 shadow rounded" style="background-color: #fff;">
                <p style="color: deeppink;"><span style="font-size: 20px;">🟦</span> <strong>Riwayat Tambah Bahan Baru</strong></p>
                <p><strong>Shampoo</strong> ditambahkan sebanyak <strong>20</strong> pada tanggal 01-06-2025, pukul 21.52.32</p>
                <p><strong>Conditioner Shampoo</strong> ditambahkan sebanyak <strong>20</strong> pada tanggal 01-06-2025, pukul 21.50.03</p>
            </div>
        </div>

        <!-- Tambah Stok -->
        <div class="col">
            <div class="p-3 shadow rounded" style="background-color: #fff;">
                <p style="color: green;"><span style="font-size: 20px;">🟩</span> <strong>Riwayat Tambah Stok</strong></p>
                <p><strong>Shampoo</strong> ditambah stok sebanyak <strong>5</strong> pada tanggal 01-06-2025, pukul 21.56.21</p>
            </div>
        </div>

        <!-- Pakai Bahan -->
        <div class="col">
            <div class="p-3 shadow rounded" style="background-color: #fff;">
                <p style="color: crimson;"><span style="font-size: 20px;">🟥</span> <strong>Riwayat Pakai Bahan</strong></p>
                <p><strong>Conditioner Shampoo</strong> ditambah stok sebanyak <strong>5</strong> pada tanggal 01-06-2025, pukul 21.58.54</p>
            </div>
        </div>

        <!-- Edit Bahan Baku -->
        <div class="col">
            <div class="p-3 shadow rounded" style="background-color: #fff;">
                <p style="color: cornflowerblue;"><span style="font-size: 20px;">🟪</span> <strong>Riwayat Edit Bahan Baku</strong></p>
                <p><strong>Shampoo</strong> di edit minimum stok sebanyak <strong>10</strong> pada tanggal 01-06-2025, pukul 21.59.12</p>
                <p><strong>Shampoo</strong> di edit stok sebanyak <strong>25</strong> pada tanggal 01-06-2025, pukul 21.54.32</p>
            </div>
        </div>

        <!-- Hapus Bahan Baku -->
        <div class="col">
            <div class="p-3 shadow rounded" style="background-color: #fff;">
                <p style="color: red;"><span style="font-size: 20px;">🟥</span> <strong>Riwayat Hapus Bahan Baku</strong></p>
                <p><strong>Shampoo</strong> dihapus pada tanggal 01-06-2025, pukul 22.01.42</p>
            </div>
        </div>
    </div>
</div>
@endsection