<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadkegiatan_m extends Model
{
    use HasFactory;

    protected $table = "tb_upload_kegiatan";

    protected $fillable = [
        'nama_kegiatan',
        'deskripsi_kegiatan',
        'gambar_kegiatan',
        'status_kegiatan'
    ];
}
