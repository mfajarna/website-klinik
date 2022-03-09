<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalkerjadokter_m extends Model
{
    use HasFactory;

    protected $table = "tb_jadwalkerjadokter";
    protected $fillable = [
        'id_dokter',
        'hari_kerja',
        'jam_mulai_kerja',
        'jam_selesai_kerja'
    ];


    public function dokter()
    {
        return $this->belongsTo(Dokter_m::class, 'id_dokter');
    }
}
