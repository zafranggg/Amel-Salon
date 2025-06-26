<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatment'; 

    protected $primaryKey = 'id_treatment'; 

    public $timestamps = false; 

    protected $fillable = [
        'nama_treatment',
        'durasi',
        'harga',
        'kategori',
    ];
}
