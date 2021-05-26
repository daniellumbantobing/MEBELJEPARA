<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = ['id'];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function pemesananproduk()
    {
        return $this->hasMany(PemesananProduk::class);
    }

    public function tempaan()
    {
        return $this->hasMany(Tempaan::class);
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