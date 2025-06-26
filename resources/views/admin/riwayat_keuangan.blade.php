@extends('layout.app')
@section('title', 'Bahan Baku')
@section('content')
@section('nama')
    <h3 class="mt-4">Riwayat Keuangan</h3>

@endsection
{{-- content --}}
<div class="container mt-4 p-4" style="border: 2px solid hotpink; border-radius: 15px;">
    <h3 class="text-center mb-4" style="color: hotpink;">
        <img src="https://img.icons8.com/color/48/clock--v1.png" alt="clock" style="width: 30px; margin-bottom: 5px;">
        <strong>Riwayat Keuangan</strong>
    </h3>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Tambah Bahan Baru -->
        <div class="col">
            <div class="p-3 shadow rounded" style="background-color: #fff;">
                <p style="color: rgb(255, 8, 37);"><span style="font-size: 20px;">🟥</span> <strong>Riwayat Tambah Pengeluaran</strong></p>
                <p><strong>Shampoo</strong> ditambahkan sebanyak <strong>20</strong> pada tanggal 01-06-2025, pukul 21.52.32</p>
                <p><strong>Conditioner Shampoo</strong> ditambahkan sebanyak <strong>20</strong> pada tanggal 01-06-2025, pukul 21.50.03</p>
            </div>
        </div>

        <!-- Tambah Stok -->
        <div class="col">
            <div class="p-3 shadow rounded" style="background-color: #fff;">
                <p style="color: rgb(175, 45, 45);"><span style="font-size: 20px;">🟥</span> <strong>Riwayat Hapus Pengeluaran</strong></p>
                <p><strong>Shampoo</strong> ditambah stok sebanyak <strong>5</strong> pada tanggal 01-06-2025, pukul 21.56.21</p>
            </div>
        </div>

    </div>
</div>
@endsection