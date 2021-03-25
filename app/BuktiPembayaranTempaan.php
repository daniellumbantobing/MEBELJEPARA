<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuktiPembayaranTempaan extends Model
{
    protected $table = 'bukti_pembayaran_tempaan';

    public function tempaan()
    {
        return $this->belongsTo(Tempaan::class);
    }
}