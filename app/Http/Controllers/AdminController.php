<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $produk = DB::table('pemesanan_produk')->select(DB::raw("produk_id"), DB::raw("count(produk_id) as jumlah"))
            ->groupBy('produk_id')
            ->orderBy('jumlah', 'desc')->limit(5)->get();


        //Produk Biasa
        $date = DB::table('pemesanan')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as date"), DB::raw('sum(total_harga) as total'))
            ->groupBy('date')
            ->get();
        $tgl = [];

        $total = [];


        foreach ($date as $ds) {
            $total[] =  $ds->total;
            $tgl[] =  date('M Y', strtotime($ds->date));
        }


        //Tempaan
        $dateTempaan = DB::table('tempaan')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as date"), DB::raw('sum(total_biaya) as total'))
            ->groupBy('date')
            ->get();
        $tglTempaan = [];

        $totalTempaan = [];

        foreach ($dateTempaan as $ds) {
            $totalTempaan[] =  $ds->total;
            $tglTempaan[] =  date('M Y', strtotime($ds->date));
        }

        //Reparasi
        $dateReparasi = DB::table('reparasi')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as date"), DB::raw('sum(biaya) as total'))
            ->groupBy('date')
            ->get();
        $tglReparasi = [];

        $totalReparasi = [];

        foreach ($dateReparasi as $ds) {
            $totalReparasi[] =  $ds->total;
            $tglReparasi[] =  date('M Y', strtotime($ds->date));
        }

        return view('admin.home', compact(['produk', 'tgl', 'total', 'tglTempaan', 'totalTempaan', 'tglReparasi', 'totalReparasi']));
    }
}