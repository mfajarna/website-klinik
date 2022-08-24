<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrianpasien extends Model
{
    use HasFactory;

    protected $table ="tb_antrian_pasien";

    protected $fillable = [
        'id_pasien',
        'id_poli',
        'no_antrian',
        'status'
    ];


    public function pasien()
    {
        return $this->belongsTo(Pasien_m::class, 'id_pasien');
    }

    public function poli()
    {
        return $this->belongsTo(Poli_m::class, 'id_poli');
    }

    
}
