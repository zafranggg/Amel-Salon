<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'tanggal', 'jam_mulai', 'jam_selesai', 'status', 'staff', 'catatan'
    ];
}
