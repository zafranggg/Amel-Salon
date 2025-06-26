<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
        use HasFactory;

    protected $table = 'staff_hari_ini';

    protected $fillable = [
        'nama_staff',
        'shift',
        'tanggal',
    ];
}
