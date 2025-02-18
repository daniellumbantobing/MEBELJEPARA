<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\Reparasi;
use App\Tempaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {

        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $d =    Pemesanan::whereDay('created_at', $day)->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('status_pembayaran', 'Sudah Dibayar')->sum('total_harga');
        $d1 =   Pemesanan::whereDay('created_at', $day)->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('status_pembayaran', 'Sudah Dibayar')->count();

        if ($request->has('hari') && $request->has('bulan') && $request->has('tahun')) {
            $d =    Pemesanan::whereDay('created_at', $request->hari)->whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->sum('total_harga');
            $d1 =   Pemesanan::whereDay('created_at', $request->hari)->whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->count();
        } else if ($request->has('bulan') && $request->has('tahun')) {
            $d =    Pemesanan::whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->sum('total_harga');
            $d1 =   Pemesanan::whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->count();
        }

        $date = DB::table('pemesanan')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as date"), DB::raw('sum(total_harga) as total'))
            ->where('status_pembayaran', 'Sudah Dibayar')
            ->groupBy('date')
            ->get();
        $tgl = [];

        $total = [];

        foreach ($date as $ds) {
            $total[] =  $ds->total;
            $tgl[] =  date('M Y', strtotime($ds->date));
        }





        return view('admin.laporan', compact(['d1', 'd', 'request',  'date', 'tgl', 'total']));
    }

    public function tempaan(Request $request)
    {

        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $d =    Tempaan::whereDay('created_at', $day)->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('status_pembayaran', 'Sudah Dibayar')->sum('total_biaya');
        $d1 =   Tempaan::whereDay('created_at', $day)->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('status_pembayaran', 'Sudah Dibayar')->count();

        if ($request->has('hari') && $request->has('bulan') && $request->has('tahun')) {
            $d =    Tempaan::whereDay('created_at', $request->hari)->whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->sum('total_biaya');
            $d1 =   Tempaan::whereDay('created_at', $request->hari)->whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->count();
        } else if ($request->has('bulan') && $request->has('tahun')) {
            $d =    Tempaan::whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->sum('total_biaya');
            $d1 =   Tempaan::whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->count();
        }

        $date = DB::table('tempaan')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as date"), DB::raw('sum(total_biaya) as total'))
            ->where('status_pembayaran', 'Sudah Dibayar')
            ->groupBy('date')
            ->get();
        $tgl = [];

        $total = [];

        foreach ($date as $ds) {
            $total[] =  $ds->total;
            $tgl[] =  date('M Y', strtotime($ds->date));
        }





        return view('admin.laporantempaan', compact(['d1', 'd', 'request',  'date', 'tgl', 'total']));
    }


    public function reparasi(Request $request)
    {

        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $d =    Reparasi::whereDay('created_at', $day)->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('status_pembayaran', 'Sudah Dibayar')->sum('biaya');
        $d1 =   Reparasi::whereDay('created_at', $day)->whereMonth('created_at', $month)->whereYear('created_at', $year)->where('status_pembayaran', 'Sudah Dibayar')->count();

        if ($request->has('hari') && $request->has('bulan') && $request->has('tahun')) {
            $d =    Reparasi::whereDay('created_at', $request->hari)->whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->sum('biaya');
            $d1 =   Reparasi::whereDay('created_at', $request->hari)->whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->count();
        } else if ($request->has('bulan') && $request->has('tahun')) {
            $d =    Reparasi::whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->sum('biaya');
            $d1 =   Reparasi::whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->where('status_pembayaran', 'Sudah Dibayar')->count();
        }





        $date = DB::table('reparasi')
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as date"), DB::raw('sum(biaya) as total'))
            ->where('status_pembayaran', 'Sudah Dibayar')
            ->groupBy('date')
            ->get();
        $tgl = [];

        $total = [];

        foreach ($date as $ds) {
            $total[] =  $ds->total;
            $tgl[] =  date('M Y', strtotime($ds->date));
        }




        return view('admin.laporanreparasi', compact(['d1', 'd', 'request', 'date', 'tgl', 'total']));
    }
}