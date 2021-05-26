<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
    public function pemesananproduk()
    {
        return $this->hasMany(PemesananProduk::class);
    }
    public function tempaan()
    {
        return $this->hasMany(Tempaan::class);
    }

    public function notif()
    {
        return $this->belongsTo(Notifikasi::class);
    }

    public function reparasi()
    {
        return $this->hasMany(Reparasi::class);
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}