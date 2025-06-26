<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $groupedTreatments = \App\Models\Treatment::all()->groupBy('kategori');

        $kategoriImages = [
            'Paketan Potong Rambut' => 'assets/gambar/potong.png',
            'Cuci Catok / Styling' => 'assets/gambar/catokblow.png',
            'Nail / Eyelash / Lashlift' => 'assets/gambar/naileyelas.png',
            'Manicure Pedicure & Waxing' => 'assets/gambar/manicurepedicure2.png',
            'Hair Mask' => 'assets/gambar/hairmaks.png',
            'Creambath' => 'assets/gambar/hairmaks.png',
            'Smoothing / Coloring / Keratin' => 'assets/gambar/smoothing.png',
            'Face Treatment' => 'assets/gambar/facetreatment.png',
            'Body Massage' => 'assets/gambar/boddymassage.png',
        ];
        return view('pelanggan.treatment_salon', compact('groupedTreatments', 'kategoriImages'));
    }
}
