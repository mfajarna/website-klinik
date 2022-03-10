<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli_m extends Model
{
    use HasFactory;

    protected $table = "tb_poli";

    protected $fillable = [
        'nama_poli',
        'desc_poli',
        'status'
    ];


    public function antrian()
    {
        return $this->hasOne(Antrian_m::class);
    }

    public function dokter_poli()
    {
        return $this->hasMany(Dokterpoli_m::class, 'id');
    }
}
