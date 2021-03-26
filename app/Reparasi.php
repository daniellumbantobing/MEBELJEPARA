<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reparasi extends Model
{
    protected $table = 'reparasi';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buktipembayarantrep()
    {
        return $this->hasOne(BuktiPembayaranReparasi::class);
    }
}