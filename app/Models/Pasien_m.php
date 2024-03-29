<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien_m extends Model
{
    use HasFactory;

    protected $table = "tb_pasien";

    protected $fillable = [
        'id_user',
        'nama',
        'nikes',
        'no_telp',
        'keluhan',
        'alamat',
        'umur',
        'jenis_kelamin',
        'nama_orang_tua'
    ];

    public function antrian()
    {
        return $this->hasMany(Antrianpasien::class, 'id');
    }

    public function keluhan()
    {
        return $this->hasMany(Keluhanpasien_m::class, 'id');
    }

    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaanpasien_m::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
}
