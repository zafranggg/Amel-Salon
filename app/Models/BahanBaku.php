<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $fillable = ['nama_bahan', 'jumlah', 'minimum_stok', 'gambar'];
}

