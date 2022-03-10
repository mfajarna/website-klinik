<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokterpoli_m extends Model
{
    use HasFactory;

    protected $table = "tb_dokterpoli";
    protected $fillable = [
        'id_dokter',
        'id_poli',
        'status'
    ];


    public function dokter()
    {
        return $this->belongsTo(Dokter_m::class, 'id_dokter');
    }

    public function poli()
    {
        return $this->belongsTo(Poli_m::class, 'id_poli');
    }
}
