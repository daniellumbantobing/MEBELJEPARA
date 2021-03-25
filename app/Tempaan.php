<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempaan extends Model
{
    protected $table = 'tempaan';

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function buktipembayarantemp()
    {
        return $this->hasOne(BuktiPembayaranTempaan::class);
    }
}