<?php

namespace App\Http\Controllers;

use \App\Notifikasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class NotifikasiController extends Controller
{

    public function index()
    {

        $notif = Notifikasi::latest()->paginate(10);
        return view('admin.notfikasi', compact(['notif']));
    }
    public function hapus($id)
    {

        Notifikasi::find($id)->delete($id);

        return redirect()->back();
    }
}