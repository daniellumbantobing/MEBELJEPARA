<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {

        $day = Carbon::now()->format('d');
        $month = Carbon::now()->addMonth(1)->format('m');
        $year = Carbon::now()->format('Y');

        $d =    Pemesanan::whereMonth('created_at', $month)->whereYear('created_at', $year)->where('status_pembayaran', 'Sudah Dibayar')->sum('total_harga');
        $d1 =   Pemesanan::whereDay('created_at', $day)->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('status_pembayaran', 'Sudah Dibayar')->count();

        if ($request->has('day') || $request->has('month') || $request->has('year')) {
            $d =    Pemesanan::whereDay('created_at', $request->day)->where('status_pembayaran', 'Sudah Dibayar')->sum('total_harga');
            $d1 =    Pemesanan::whereDay('created_at', $request->day)->where('status_pembayaran', 'Sudah Dibayar')->count();
        }




        return view('admin.laporan', compact(['d1', 'd']));
    }
}