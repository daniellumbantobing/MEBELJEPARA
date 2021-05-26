<?php

namespace App\Http\Controllers;

use App\BuktiPembayaran;
use App\BuktiPembayaranReparasi;
use App\Notifikasi;
use App\Reparasi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReparasiController extends Controller
{
    public function index()
    {
        return view('user.reparasi');
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_hp' => 'required',
            'gambar1' => 'required|mimes:jpeg,png,jpg|max:2000',
            'gambar2' => 'nullable|mimes:jpeg,png,jpg|max:2000',
            'gambar3' => 'nullable|mimes:jpeg,png,jpg|max:2000',
            'jenis_kerusakan' => 'required',
            'keterangan' => 'required',
        ], [
            'gambar1.max' => 'Gambar maksimal 2 MB',
            'gambar2.max' => 'Gambar maksimal 2 MB',
            'gambar3.max' => 'Gambar maksimal 2 MB'
        ]);

        //gambar1
        $imgName1 = $request->gambar1->getClientOriginalName() . '-' . time()
            . '.' . $request->gambar1->extension();

        $request->gambar1->move(public_path('reparasi'), $imgName1);

        //gambar2
        if ($request->hasFile('gambar2')) {
            $imgName2 = $request->gambar2->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar2->extension();

            $request->gambar2->move(public_path('reparasi'), $imgName2);
        } else {

            $imgName2 = NULL;
        }


        //gambar3
        if ($request->hasFile('gambar3')) {

            $imgName3 = $request->gambar3->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar3->extension();

            $request->gambar3->move(public_path('reparasi'), $imgName3);
        } else {
            $imgName3 = NULL;
        }

        $reparasi = new Reparasi();
        $reparasi->user_id = Auth::user()->id;
        $reparasi->nama = $request->nama;
        $reparasi->alamat = $request->alamat;
        $reparasi->kode_pos = $request->kode_pos;
        $reparasi->no_hp = $request->no_hp;
        $reparasi->gambar1 = $imgName1;
        $reparasi->gambar2 = $imgName2;
        $reparasi->gambar3 = $imgName3;
        $reparasi->jenis_kerusakan = $request->jenis_kerusakan;
        $reparasi->keterangan = $request->keterangan;
        $reparasi->status_pemesanan = "Belum Dikirim";
        $reparasi->status_pembayaran = "Belum Dibayar";
        $reparasi->save();

        $reparasi = DB::getPdo()->lastInsertId();

        $id = $reparasi;
        $user = User::where('id', Auth::user()->id)->first();

        $notif = new Notifikasi;
        $notif->user_id = 1;
        $notif->isi =  $user->nama_depan . " Mememesan layanan reparasi ";
        $notif->id_notif = 2;
        $notif->status = 1;
        $notif->save();


        return redirect('/viewreparasi/' . $id)->with('sukses', 'Reparasi berhasil direquest');
    }
    public function viewreparasi($id)
    {
        $user_id = Auth::user()->id;
        $reparasi = Reparasi::where('user_id', $user_id)->where('id', $id)->first();
        $reparasi1 = Reparasi::where('user_id', $user_id)->where('id', $id)->get();

        if (empty($reparasi)) {
            return redirect('/');
        }
        // $pesananpro = PemesananProduk::where('user_id', $user_id)->first();
        // // $pesananPro = PemesananProduk::where('')->first;
        return view('user.viewreparasi', compact(['reparasi', 'reparasi1']));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_hp' => 'required',
            'gambar1' => 'required|mimes:jpeg,png,jpg|max:2000',
            'gambar2' => 'nullable|mimes:jpeg,png,jpg|max:2000',
            'gambar3' => 'nullable|mimes:jpeg,png,jpg|max:2000',
            'jenis_kerusakan' => 'required',
            'keterangan' => 'required',
        ], [
            'gambar1.max' => 'Gambar maksimal 2 MB',
            'gambar2.max' => 'Gambar maksimal 2 MB',
            'gambar3.max' => 'Gambar maksimal 2 MB'
        ]);
        $reparasi = Reparasi::find($id);
        $reparasi->update($request->all());

        if ($request->hasFile('gambar1')) {
            $imgName1 = $request->gambar1->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar1->extension();

            $request->gambar1->move(public_path('reparasi'), $imgName1);

            $reparasi->gambar1 = $imgName1;
            $reparasi->save();
        }

        if ($request->hasFile('gambar2')) {
            $imgName2 = $request->gambar2->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar2->extension();

            $request->gambar2->move(public_path('reparasi'), $imgName2);

            $reparasi->gambar2 = $imgName2;
            $reparasi->save();
        }

        if ($request->hasFile('gambar3')) {
            $imgName3 = $request->gambar3->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar3->extension();

            $request->gambar3->move(public_path('reparasi'), $imgName3);

            $reparasi->gambar3 = $imgName3;
            $reparasi->save();
        }


        return back()->with('sukses', 'Data reparasi berhasil diupdate');
    }
    public function pesanan()
    {
        $reparasi = Reparasi::latest()->paginate(5);
        return view('admin.pesananreparasi', compact(['reparasi']));
    }

    public function detreparasi($id)
    {
        $det_tempaan = Reparasi::where('id', $id)->first();

        return view('admin.detailreparasi', compact(['det_tempaan']));
    }

    public function status_reparasi(Request $request, $id)
    {

        $this->validate($request, [
            'ket_reparasi' => 'required',

        ]);
        $reparasi = Reparasi::find($id);
        $reparasi->ket_reparasi = $request->ket_reparasi;
        $reparasi->status_pemesanan = "Dibatalkan";
        $reparasi->save();


        $notif = new Notifikasi();
        $notif->user_id = $reparasi->user_id;
        $notif->isi =  "Reparasi Anda Dibatalkan<br>dengan no reparasi#" . $reparasi->id;
        $notif->status = 1;
        $notif->save();

        return back()->with('sukses', 'Reparasi berhasil dibatalkan');
    }
    public function buatbiaya(Request $request, $id)
    {

        $this->validate($request, [
            'biaya' => 'required',

        ]);
        $reparasi = Reparasi::find($id);
        $reparasi->biaya = str_replace(".", "", $request->biaya);
        $reparasi->save();


        $notif = new Notifikasi;
        $notif->user_id = $reparasi->user_id;
        $notif->isi =  "Cek Biaya reparasi Anda<br>dengan no reparasi#" . $reparasi->id;
        $notif->status = 1;
        $notif->save();

        return back()->with('sukses', 'Biaya tempaan berhasil dibuat');
    }

    public function pembayaran($id)
    {
        $user_id = Auth::user()->id;

        $tempaan = Reparasi::where('user_id', $user_id)->where('id', $id)->first();

        if (empty($tempaan)) {
            return redirect('/');
        }
        // $pesananpro = PemesananProduk::where('user_id', $user_id)->first();
        // // $pesananPro = PemesananProduk::where('')->first;
        return view('user.payreparasi', compact(['tempaan']));
    }


    public function checkoutreparasi(Request $request, $id)
    {
        $tempaan = Reparasi::find($id);
        $tempaan->transfer_bank = $request->transfer_bank;
        $tempaan->save();

        return redirect('/konfirmreparasi/' . $id);
    }

    public function konfirmreparasi($id)
    {
        $user_id = Auth::user()->id;


        $tempaan = Reparasi::where('user_id', $user_id)->where('id', $id)->first();

        if (empty($tempaan)) {
            return redirect('/');
        }
        // $pesananpro = PemesananProduk::where('user_id', $user_id)->first();
        // // $pesananPro = PemesananProduk::where('')->first;
        return view('user.konfirmreparasi', compact(['tempaan']));
    }

    public function buktireparasi(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'nama' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg'
        ]);

        $imgName = $request->gambar->getClientOriginalName() . '-' . time()
            . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('buktipembayaran'), $imgName);
        $id = $request->reparasi_id;
        $bukti = new BuktiPembayaranReparasi();
        $bukti->reparasi_id = $id;
        $bukti->nama_pengirim = $request->nama;
        $bukti->tanggal_dikirim = $request->tanggal;
        $bukti->gambar = $imgName;
        $bukti->save();
        DB::table('reparasi')->where('id', $id)->update(['status_pembayaran' => 'Sudah Dibayar']);
        $reparasi = DB::table('reparasi')->where('id', $id)->where('status_pembayaran', 'Sudah Dibayar')->first();

        $notif = new Notifikasi;
        $notif->user_id = 1;
        $notif->isi =  Auth()->user()->nama_depan . " telah membayar reparasi<br> dengan No order #" . $id;
        $notif->id_notif = 2;
        $notif->status = 1;
        $notif->save();

        if (!empty($reparas)) {
            return redirect('/');
        }

        return redirect('/terimakasih/' . $id)->with('sukses', 'Berhasil Upload Bukti Pembayaran');
    }


    public function konfirmasireparasi($id)
    {
        Reparasi::where('id', $id)->update(['status_pemesanan' => 'Dikirim']);
        $reparasi =  Reparasi::where('id', $id)->first();


        $notif = new Notifikasi;
        $notif->user_id = $reparasi->user_id;
        $notif->isi = "Reparasi anda dikonfirmasi <br> dengan No order #" . $reparasi->id;
        $notif->status = 1;
        $notif->save();
        //  User::find($pemesanan->user_id)->notify(new InvoicePaid);
        return redirect()->back()->with('sukses', 'Tempaan Dikonfirmasi');
    }
    public function batalkonfirmasi($id)
    {
        Reparasi::where('id', $id)->update(['status_pemesanan' => 'Batal Dikirim']);
        return redirect()->back()->with('sukses', 'Produk Batal Dikonfirmasi');
    }

    public function batal($id)
    {
        Reparasi::where(['id' => $id, 'user_id' => Auth()->user()->id])->update(['status_pemesanan' => 'Dibatalkan']);

        return redirect()->back()->with('batal', 'Pemesanan Reparasi Dibatalkan');
    }
}