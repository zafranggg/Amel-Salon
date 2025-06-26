<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    public function setPasswordAttribute($value)
{
    $this->attributes['password'] = Hash::make($value);
}
    protected $table = 'pelanggan'; // Nama tabel di database

    protected $primaryKey = 'id_pelanggan'; // Primary key kustom

    public $timestamps = false; // Karena tidak pakai kolom created_at dan updated_at default Laravel

    protected $fillable = [
        'nama_pelanggan',
        'email',
        'password',
        'role',
        'no_hp',
        'dibuat_pada',
    ];

    public function bookings()
{
    return $this->hasMany(Booking::class, 'id_pelanggan', 'id_pelanggan');
}


}
