<?php

namespace App\Http\Controllers;

use \App\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    
    public function hapus($id){

    	 Notifikasi::find($id)->delete($id);
  
   		return redirect()->back();

    }
}
