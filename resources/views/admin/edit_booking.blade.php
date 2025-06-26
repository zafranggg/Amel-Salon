@extends('layout.app')

@section('content')
<div class="d-flex justify-content-center align-items-center mt-5" style="min-height: 100vh; background-color: #fef2f5;">
    <div class="card shadow p-4" style="width: 600px; background-color: white;">
        <h4 class="text-center mb-4">
            <i class="bi bi-pencil"></i> Edit
        </h4>

        <form style="text-align: left">
            <div class="mb-3">
                <label class="form-label fw-bold">
                    <i class="bi bi-person-fill"></i> Pelanggan Baru (Belum Punya Akun)
                </label>
                <input type="text" class="form-control mb-2" value="Adelia Setiabuko">
                <input type="text" class="form-control" value="0822-2222-2222">
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label class="form-label fw-bold">Tanggal</label>
                    <input type="text" class="form-control" value="03/04">
                </div>
                <div class="col-6">
                    <label class="form-label fw-bold">Metode Pembayaran</label>
                    <input type="text" class="form-control" value="Transfer">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Waktu</label>
                <input type="text" class="form-control" value="10:30">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold"><i class="bi bi-heart-fill"></i> Pilih Treatment</label>
                <div class="d-flex gap-2 mb-2">
    <input type="text" class="form-control" value="Smoothing">
    <span class="input-group-text">Rp 600.000</span>
    <button class="btn btn-danger" type="button">Hapus</button>
</div>

                <button class="btn btn-success w-100" type="button">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Treatment
                </button>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label class="form-label fw-bold">DP Awal</label>
                    <input type="text" class="form-control" value="Rp 100.000">
                </div>
                <div class="col-6">
                    <label class="form-label fw-bold">Status Booking</label>
                    <input type="text" class="form-control bg-light" value="Menunggu Jadwal" readonly>
                </div>
            </div>

            <div class="mb-3 text-end">
                <p><strong><i class="bi bi-cash-coin"></i> Total Bayar:</strong> Rp 100.000</p>
                <p><strong>Sisa Bayar:</strong> Rp 500.000</p>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url('/menunggu_jadwal') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-pink text-white">
                    <i class="bi bi-save-fill"></i> Simpan Transaksi
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .btn-pink {
        background-color: #f82b9c;
        border: none;
    }
</style>
@endsection
