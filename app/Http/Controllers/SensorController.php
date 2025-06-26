<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $data = new SensorData();
        $data->nilai = $request->input('nilai'); // Ambil data dari Arduino
        $data->save();

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    public function index()
    {
        return SensorData::latest()->get();
    }
}
