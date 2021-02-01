<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = ['id'];


    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
