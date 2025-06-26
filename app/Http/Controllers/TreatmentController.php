<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;

class TreatmentController extends Controller
{
public function index(Request $request)
    {
        $kategoriList = Treatment::select('kategori')->distinct()->pluck('kategori');
        $query = \App\Models\Treatment::query();


    // Filter berdasarkan kategori
    if ($request->filled('kategori')) {
        $query->where('kategori', 'like', '%' . $request->kategori . '%');
    }

    // Filter berdasarkan rentang harga
    if ($request->filled('harga_min')) {
        $query->where('harga', '>=', $request->harga_min);
    }

    if ($request->filled('harga_max')) {
        $query->where('harga', '<=', $request->harga_max);
    }

    $treatments = $query->orderBy('kategori')->get();

     return view('admin.treatment_salon', compact('treatments', 'kategoriList'));

    }

    public function create()
    {
        return view('admin.treatment_salon');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'nama_treatment' => 'required|string|max:255',
            'durasi' => 'required|string|max:20',
            'harga' => 'required|numeric',
        ]);

        Treatment::create([
            'kategori' => $request->kategori,
            'nama_treatment' => $request->nama_treatment,
            'durasi' => $request->durasi,
            'harga' => $request->harga,
        ]);

        return redirect()->route('treatment.index')->with('success', 'Treatment berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $treatment = Treatment::findOrFail($id);
        return view('admin.treatment_salon', compact('treatment'));
    }

    public function update(Request $request, $id_treatment)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'nama_treatment' => 'required|string|max:255',
            'durasi' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $treatment = Treatment::where('id_treatment', $id_treatment)->firstOrFail();

        $treatment->update([
            'kategori' => $request->kategori,
            'nama_treatment' => $request->nama_treatment,
            'durasi' => $request->durasi,
            'harga' => $request->harga,
        ]);

        return redirect()->route('treatment.index')->with('success', 'Treatment berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->delete();

        return redirect()->route('treatment.index')->with('success', 'Treatment berhasil dihapus!');
    }

}
