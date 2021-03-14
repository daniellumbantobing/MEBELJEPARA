<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buktipembayaran()
    {
        return $this->hasOne(BuktiPembayaran::class);
    }

    public function pemesananproduk()
    {
        return $this->hasMany(PemesananProduk::class);
    }
}