<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensidokter_m extends Model
{
    use HasFactory;

    protected $table = "tb_absensidokter";
    protected $fillable = [
          "id_dokter",
          "tanggal_absensi",
          "clock_in",
          "clock_out"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

}
