<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Treatment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index()
    {
         $user = auth()->user();
        $treatmentFavorit = DB::table('booking_treatment')
            ->join('treatment', 'booking_treatment.id_treatment', '=', 'treatment.id_treatment')
            ->select('treatment.nama_treatment as nama', 'booking_treatment.id_treatment', DB::raw('COUNT(*) as total'))
            ->groupBy('booking_treatment.id_treatment', 'treatment.nama_treatment')
            ->orderByDesc('total')
            ->limit(4)
            ->get();
            
        return view('pelanggan.beranda', compact('user', 'treatmentFavorit'));
    }
}
