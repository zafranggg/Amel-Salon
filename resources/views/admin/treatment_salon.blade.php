@extends('layout.app')
@section('title', 'Treatment Salon')

@section('content')

@section('nama')
<h3 class="mt-4 mb-4">Treatment Salon</h3>

<!-- Judul Tengah -->
<div class="text-center mb-5">
    <h1 class="fw-bold" style="color: #e80060;">
        <i class="bi bi-heart-fill text-danger"></i> Daftar Lengkap Treatment Salon
    </h1>
</div>

<!-- Kartu Treatment -->
<div class="container mb-4">
    <div class="row justify-content-center gap-4">

        <!-- Paket Potong Rambut -->
        <div class="col-md-5 bg-white p-4 rounded-4 shadow-sm border border-danger-subtle" style="background-color: #ffeef5;">
            <h5 class="fw-bold text-danger mb-3">
                ✂️ Paketan Potong Rambut
            </h5>
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('img/treatment1.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
                <img src="{{ asset('img/treatment2.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
                <img src="{{ asset('img/treatment3.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
            </div>
            <ul class="list-unstyled">
                <li>• Potong - 40K</li>
                <li>• Potong Poni - 20K</li>
                <li>• Potong + Cuci - 85K</li>
                <li>• Potong + Catok - 80K</li>
                <li>• Potong + Cuci + Catok - 95K</li>
            </ul>
        </div>

        <!-- Cuci Catok/Catok/Hair Styling -->
        <div class="col-md-5 bg-white p-4 rounded-4 shadow-sm border border-danger-subtle" style="background-color: #ffeef5;">
            <h5 class="fw-bold text-primary mb-3">
                💇‍♀️ Cuci Catok/Catok/Hair Styling
            </h5>
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('img/styling1.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
                <img src="{{ asset('img/styling2.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
                <img src="{{ asset('img/styling3.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
            </div>
            <small class="text-muted">
                <em>Paket Cuci Catok (inkl. shampoo, conditioner, styling, VIT, Hair Spray)</em><br>
                <em>Paket Catok styling, Hair VIT, Hair vitamin</em>
            </small>
            <ul class="list-unstyled mt-2">
                <li>• Cuci Catok Blow - 50K</li>
                <li>• Cuci Catok Curly - 60K</li>
                <li>• Catok Blow - 35K</li>
                <li>• Catok Curly - 40K</li>
                <li>• Cuci Kering - 30K</li>
            </ul>
        </div>
        <!-- Paket Potong Rambut -->
        <div class="col-md-5 bg-white p-4 rounded-4 shadow-sm border border-danger-subtle" style="background-color: #ffeef5;">
            <h5 class="fw-bold text-danger mb-3">
                ✂️ Paketan Potong Rambut
            </h5>
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('img/treatment1.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
                <img src="{{ asset('img/treatment2.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
                <img src="{{ asset('img/treatment3.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
            </div>
            <ul class="list-unstyled">
                <li>• Potong - 40K</li>
                <li>• Potong Poni - 20K</li>
                <li>• Potong + Cuci - 85K</li>
                <li>• Potong + Catok - 80K</li>
                <li>• Potong + Cuci + Catok - 95K</li>
            </ul>
        </div>

        <!-- Cuci Catok/Catok/Hair Styling -->
        <div class="col-md-5 bg-white p-4 rounded-4 shadow-sm border border-danger-subtle" style="background-color: #ffeef5;">
            <h5 class="fw-bold text-primary mb-3">
                💇‍♀️ Cuci Catok/Catok/Hair Styling
            </h5>
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('img/styling1.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
                <img src="{{ asset('img/styling2.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
                <img src="{{ asset('img/styling3.jpg') }}" class="rounded-circle mx-2" width="60" height="60" alt="..." />
            </div>
            <small class="text-muted">
                <em>Paket Cuci Catok (inkl. shampoo, conditioner, styling, VIT, Hair Spray)</em><br>
                <em>Paket Catok styling, Hair VIT, Hair vitamin</em>
            </small>
            <ul class="list-unstyled mt-2">
                <li>• Cuci Catok Blow - 50K</li>
                <li>• Cuci Catok Curly - 60K</li>
                <li>• Catok Blow - 35K</li>
                <li>• Catok Curly - 40K</li>
                <li>• Cuci Kering - 30K</li>
            </ul>
        </div>

    </div>
</div>

@endsection
@endsection
