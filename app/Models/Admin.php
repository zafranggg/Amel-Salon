<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admin'; // Nama tabel

    protected $primaryKey = 'id_admin'; // Primary key kustom

    public $timestamps = false; // Tidak pakai created_at dan updated_at Laravel

    protected $fillable = [
        'nama_admin',
        'email',
        'password',
        'role',
        'dibuat_pada',
        'no_hp',
        'foto',
    ];

    // Hash password otomatis saat diisi
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}