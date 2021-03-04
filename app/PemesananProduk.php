<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananProduk extends Model
{
    protected $table = 'pemesanan_produk';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}