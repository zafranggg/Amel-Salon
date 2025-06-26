<?php

namespace App\Http\Controllers;

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

        return view('admin.jadwal_treatment', [
            'pelanggan' => Pelanggan::all(),
            'treatments' => Treatment::all()
        ], compact('jadwals', 'tanggal','staffs'));
    }

    public function Jstore(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'status' => 'required|in:Kosong,Penuh',
        ]);

        Jadwal::create($request->all());

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();
        return back()->with('success', 'Jadwal dihapus');
    }
// staff
public function Sstore(Request $request)
{
    $request->validate([
        'nama_staff' => 'required|string|max:255',
        'shift' => 'required|in:pagi,siang',
    ]);

    Staff::create([
        'nama_staff' => $request->nama_staff,
        'shift' => $request->shift,
        'tanggal' => now()->toDateString(),
    ]);

    return redirect()->back()->with('success', 'Staff berhasil ditambahkan.');
}

    public function Sdestroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->back()->with('success', 'Staff berhasil dihapus');
    }
// BOOKING!!!!!!!!!
    public function create()
{
    return view('admin.jadwal_treatment', [
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
        $namaPelanggan = null;
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

    return redirect()->route('booking.create')->with('success', 'Booking berhasil ditambahkan.');
}

public function menungguKonfirmasi()
{
    $bookings = Booking::where('status', 'Menunggu konfirmasi')->get();
    return view('admin.menunggu_konfirmasi', compact('bookings'));
}
public function konfirmasi(Request $request, $id)
{
   $booking = Booking::with('treatments')->findOrFail($id);

    if ($request->aksi === 'batal') {
        $booking->status = 'Dibatalkan';
        $pesan = 'Booking telah dibatalkan.';
    } else {
        return redirect()->back()->with('error', 'Aksi tidak dikenali.');
    }

    $booking->save();
    return redirect()->back()->with('success', $pesan);
}

public function selesaikanPembayaran(Request $request, $id)
{
    $booking = Booking::with('treatments')->findOrFail($id);

    DB::transaction(function () use ($booking, $request) {
        $jumlahBayar = $request->jumlah_bayar;
        $totalHarga  = $booking->total_bayar;
        $dp = $booking->dp_awal;
        $uangDibayar = $jumlahBayar + $dp;
        $kembalian   = $uangDibayar - $totalHarga ;

        $pelangganBaru = null;
        if ($booking->id_pelanggan === null) {
            $pelangganBaru = $booking->nama;
        } elseif ($booking->id_pelanggan == true) {
            $pelangganBaru = $booking->nama;
        }

        // Buat transaksi
        $transaksi = Transaksi::create([
            'id_pelanggan' => $booking->id_pelanggan,
            'id_booking' => $booking->id_booking,
            'pelanggan_baru' => $pelangganBaru,
            'tanggal_transaksi' => now(),
            'total_pembayaran' => $booking->total_bayar,
            'metode_pembayaran' => $booking->metode_pembayaran,
            'uang_dibayar' => $uangDibayar,
            'sisa_bayar' => $booking->sisa_bayar,
            'kembalian' => $kembalian
            // 'id_booking'   => $booking->id_booking,
            // 'tanggal'      => now(),
            // 'total_pembayaran'  => $jumlahBayar,
            // 'metode'       => $booking->metode_pembayaran,
        ]);

        foreach ($booking->treatments as $treatment) {
            $transaksi->treatments()->attach($treatment->id_treatment, [
                'harga' => $treatment->harga,
            ]);
        }

        // Update status booking
        $booking->status = 'Lunas';
        $booking->save();
    });

    return redirect()->route('booking.menunggu_konfirmasi')->with('success', 'Pembayaran berhasil diselesaikan.');
}

public function dariBooking()
{
    $bookings = Booking::where('status', 'Menunggu diterima')->get();
    return view('admin.daribooking', compact('bookings'));
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
    } else {
        return redirect()->back()->with('error', 'Aksi tidak dikenali.');
    }

    return redirect()->route('booking.dari_booking')->with('success', 'Booking berhasil dikonfirmasi.');
}

public function menungguJadwal()
{
    $bookings = Booking::where('status', 'Menunggu jadwal')->get();
    return view('admin.menunggu_jadwal', compact('bookings'));
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
    } else {
        return redirect()->route('booking.menunggu_Jadwal')->with('error', 'Aksi tidak dikenali.');
    }

    return redirect()->back()->with('success', 'Jadwal berhasil dikonfirmasi.');
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

}
