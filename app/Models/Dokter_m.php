<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class Dokter_m extends Authenticatable
{
    use HasFactory;

    use HasApiTokens;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;
    use Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */


     protected $table = "tb_dokter";
     protected $fillable = [
        'nama_dokter',
        'email',
        'password',
        'role',
        'id_user'
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
        'bidang_keahlian'   => 'array'
    ];




            /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }






}
