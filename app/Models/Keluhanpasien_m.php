<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhanpasien_m extends Model
{
    use HasFactory;

    protected $table = "tb_keluhan_pasien";
    protected $fillable = [
        'id_pasien',
        'keluhan'  
    ];


    public function pasien()
    {
        return $this->belongsTo(Pasien_m::class, 'id_pasien');
    }


}
