<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'id_treatment',
        'id_pelanggan',
        'id_booking',
        'pelanggan_baru',
        'tanggal_transaksi',
        'metode_pembayaran',
        'total_pembayaran',
        'uang_dibayar',
        'kembalian',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function treatments()
    {
        return $this->belongsToMany(
            Treatment::class,
            'transaksi_treatment',
            'id_transaksi',
            'id_treatment'
        )->withPivot('harga');
    }

    public function booking() {
    return $this->belongsTo(Booking::class, 'id_booking');
}
}
