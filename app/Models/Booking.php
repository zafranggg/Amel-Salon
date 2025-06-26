<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $primaryKey = 'id_booking';
    public $timestamps = false; // karena di tabel tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'id_pelanggan',
        'nama',
        'no_hp',
        'tanggal_booking',
        'metode_pembayaran',
        'dp_awal',
        'bukti_pembayaran',
        'status',
        'total_bayar',
        'sisa_bayar',
        'jam_booking',
    ];

    // Relasi ke tabel pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class, 'booking_treatment', 'id_booking', 'id_treatment')
                    ->withPivot('harga')
                    ->withTimestamps();
    }
}
