<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian_m extends Model
{
    use HasFactory;

    protected $table = "tb_antrian";

    protected $fillable = [
        'id_poli',
        'status',
        'nomor_antrian'
    ];


    public function poli()
    {
        return $this->belongsTo(Poli_m::class, 'id_poli');
    }
}
