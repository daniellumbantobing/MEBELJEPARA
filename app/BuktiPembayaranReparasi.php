<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuktiPembayaranReparasi extends Model
{
    protected $table = 'bukti_pembayaran_reparasi';

    public function reparasi()
    {
        return $this->belongsTo(Reparasi::class);
    }
}