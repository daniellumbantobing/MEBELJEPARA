<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
	  protected $table = 'notifikasi';
 
      public function user()
    {
        return $this->hasMany(User::class);
    }

}
