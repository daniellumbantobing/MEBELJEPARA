<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    protected $table = 'bukti_pembayaran';

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}