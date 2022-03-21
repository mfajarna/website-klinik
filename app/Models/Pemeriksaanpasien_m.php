<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaanpasien_m extends Model
{
    use HasFactory;

    public $created_at;

    protected $table ="tb_pemeriksaan_pasien";

    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'pemeriksaan',
        'diagnosis',
        'terapi'
    ];

    protected $casts = [
        'updated_at' => 'string'
    ];


    public function pasien()
    {
        return $this->belongsTo(Pasien_m::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }
    
}
