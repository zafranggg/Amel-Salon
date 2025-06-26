<?php

namespace App\Http\Controllers\Pelanggan;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Treatment;
use App\Models\Booking;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Staff;
use Carbon\Carbon;

class BookingController extends Controller
{
     public function index(Request $request)
    {
        
        $tanggal = $request->input('tanggal', date('Y-m-d'));
        $jadwals = Jadwal::whereDate('tanggal', $tanggal)->orderBy('jam_mulai')->get();
        $staffs = Staff::All();

        $pelangganId = session('logged_in_user');
        $customer = Pelanggan::find($pelangganId);
        if (!$customer) {
            return redirect()->back()->with('error', 'Data pelanggan tidak ditemukan.');
        }
        return view('pelanggan.jadwal_treatment', [
            'pelanggan' => Pelanggan::all(),
            'treatments' => Treatment::all()
        ], compact('jadwals', 'tanggal','staffs','customer'));
    }

    public function create()
{
    return view('pelanggan.jadwal_treatment', [
        'pelanggan' => Pelanggan::all(),
        'treatments' => Treatment::all()
    ]);
}

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string',
            'pelanggan_baru' => 'nullable|boolean',
            'tanggal' => 'required|date', // ← ganti dari 'tanggal_booking'
            'waktu' => 'required', // ← ganti dari 'waktu_booking'
            'metode_pembayaran' => 'required|in:cash,transfer,qris',
            'dp' => $request->metode_pembayaran === 'cash' ? 'nullable' : 'required|numeric|min:0',
            'bukti_pembayaran' => $request->metode_pembayaran === 'cash' ? 'nullable' : 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'treatments' => 'required|array|min:1',
            'treatments.*.id_treatment' => 'required|exists:treatment,id_treatment',
            'treatments.*.harga' => 'required|numeric|min:0',
        ]);

        // Penentuan pelanggan
        if ($request->pelanggan_baru) {
            $idPelanggan = null;
            $namaPelanggan = $request->nama_pelanggan;
        } else {
            $pelanggan = Pelanggan::where('nama_pelanggan', $request->nama_pelanggan)->first();
            if (! $pelanggan) {
                return back()->with('error', 'Pelanggan tidak ditemukan.');
            }
            $idPelanggan = $pelanggan->id_pelanggan;
            $namaPelanggan = $request->nama_pelanggan;
        }

    $buktiPath = null;

    if ($request->hasFile('bukti_pembayaran') && $request->metode_pembayaran !== 'cash') {
        $buktiPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
    }

        // Hitung total harga treatment
        $totalHarga = array_sum(array_column($request->treatments, 'harga'));

        // Simpan data booking
        $booking = Booking::create([
            'id_pelanggan' => $idPelanggan,
            'nama' => $namaPelanggan,
            'tanggal_booking' => $request->tanggal,
            'jam_booking' => $request->waktu,
            'status' => 'Menunggu diterima',
            'metode_pembayaran' => $request->metode_pembayaran,
            'dp_awal' => $request->dp,
            'bukti_pembayaran' => $buktiPath,
            'total_bayar' => $totalHarga,
            'sisa_bayar' => max($totalHarga - $request->dp, 0),
            
        ]);

        // Hubungkan treatment dengan harga di pivot
        $syncData = [];
        foreach ($request->treatments as $t) {
            $syncData[$t['id_treatment']] = ['harga' => $t['harga']];
        }
        $booking->treatments()->sync($syncData);

        return redirect()->route('jadwalbooking.create')->with('success', 'Booking berhasil ditambahkan.');
    }   

    public function jadwalTerisi($tanggal)
    {
        // Ambil semua booking pada tanggal itu, selain status "lunas"
        $booking = Booking::whereDate('tanggal_booking', $tanggal)
                        ->where('status', '!=', 'lunas')
                        ->get(['tanggal_booking', 'jam_booking']);

        // Kembalikan list jam booking
        return response()->json($booking);
    }

    public function dariBooking()
{
    $pelangganId = session('logged_in_user');

    $bookings = Booking::where('id_pelanggan', $pelangganId)
        ->where('status', 'Menunggu diterima')
        ->orderByDesc('tanggal_booking')
        ->get();

    return view('pelanggan.daribooking', compact('bookings'));

}

public function diterima(Request $request, $id)
{
    $booking = Booking::with('treatments')->findOrFail($id);

    if ($request->aksi === 'konfirmasi') {
        $booking->status = 'Menunggu jadwal';
        $booking->save();
    } elseif ($request->aksi === 'batal') {
        $booking->status = 'Dibatalkan';
        $pesan = 'Booking telah dibatalkan.';
        $booking->save();
    } else {
        return redirect()->back()->with('error', 'Aksi tidak dikenali.');
    }
        
    return redirect()->route('booking.dari-booking')->with('success', $pesan);
}

public function menungguJadwal()
{
    $pelangganId = session('logged_in_user');

    $bookings = Booking::where('id_pelanggan', $pelangganId)
        ->where('status', 'Menunggu jadwal')
        ->orderByDesc('tanggal_booking')
        ->get();

    return view('pelanggan.menunggu_jadwal', compact('bookings'));

}

public function jadwal(Request $request, $id)
{
    $booking = Booking::with('treatments')->findOrFail($id);

    if ($request->aksi === 'konfirmasi') {
        $booking->status = 'Menunggu konfirmasi';
        $booking->save();
    } elseif ($request->aksi === 'batal') {
        $booking->status = 'Dibatalkan';
        $pesan = 'Booking telah dibatalkan.';
        $booking->save();
    } else {
        return redirect()->back()->with('error', 'Aksi tidak dikenali.');
    }

    return redirect()->route('booking.menunggu-Jadwal')->with('success', $pesan);
}
}