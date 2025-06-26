
@extends('layout.app')
@section('title', 'Treatment Salon')

@section('content')

@section('nama')
<script src="https://cdn.tailwindcss.com"></script>
<h3 class="mt-4 mb-4">Treatment Salon</h3>

<div class="max-w-7xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-pink-700 mb-12">💖 Daftar Lengkap Treatment Salon</h1>

    <div class="grid md:grid-cols-2 gap-8">
        @foreach ($groupedTreatments as $kategori => $treatments)
            <div class="bg-white border border-pink-300 shadow-xl rounded-2xl overflow-hidden">
              <img src="{{ asset($kategoriImages[$kategori] ?? 'assets/gambar/default.png') }}"
                class="w-full h-48 object-contain bg-pink-50 p-4"
                alt="{{ $kategori }}">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-rose-600 mb-4">{{ $kategori }}</h2>
                    <ul class="list-disc ml-5 text-gray-700 space-y-1">
                        @foreach ($treatments as $t)
                            <li>{{ $t->nama_treatment }} - Rp {{ number_format($t->harga, 0, ',', '.') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
@endsection
