<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Shanmuga\LaravelEntrust\Traits\LaravelEntrustUserTrait;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    
    use LaravelEntrustUserTrait; 

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function dokter()
    {
        return $this->hasMany(Dokter_m::class, 'id');
    }

    public function jadwal_kerja()
    {
        return $this->hasOne(Jadwalkerjadokter_m::class, 'id');
    }

    public function dokter_poli()
    {
        return $this->hasMany(Dokterpoli_m::class, 'id');
    }

    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaanpasien_m::class, 'id');
    }

    public function absensidokter()
    {
        return $this->hasMany(Absensidokter_m::class, 'id');
    }

    public function pasien()
    {
        return $this->hasMany(Pasien_m::class,'id');
    }
}
