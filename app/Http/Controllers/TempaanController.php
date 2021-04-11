<?php

namespace App\Http\Controllers;

use App\BuktiPembayaranTempaan;
use App\Tempaan;
use App\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TempaanController extends Controller
{
    public function index()
    {
        return view('user.tempahan');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_tempaan' => 'required',
            'nama_penerima' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_hp' => 'required',
            'gambar1' => 'mimes:jpeg,png,jpg',
            'gambar2' => 'mimes:jpeg,png,jpg',
            'gambar3' => 'mimes:jpeg,png,jpg',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);

        //gambar1
        $imgName1 = $request->gambar1->getClientOriginalName() . '-' . time()
            . '.' . $request->gambar1->extension();

        $request->gambar1->move(public_path('tempaan'), $imgName1);

        //gambar2
        if ($request->hasFile('gambar2')) {
            $imgName2 = $request->gambar2->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar2->extension();

            $request->gambar2->move(public_path('tempaan'), $imgName2);
        } else {

            $imgName2 = NULL;
        }


        //gambar3
        if ($request->hasFile('gambar3')) {

            $imgName3 = $request->gambar3->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar3->extension();

            $request->gambar3->move(public_path('tempaan'), $imgName3);
        } else {
            $imgName3 = NULL;
        }

        $tempaan = new Tempaan();
        $tempaan->user_id = Auth::user()->id;
        $tempaan->produk_id = $request->produk_id;
        $tempaan->nama_tempaan = $request->nama_tempaan;
        $tempaan->nama_penerima = $request->nama_penerima;
        $tempaan->alamat = $request->alamat;
        $tempaan->kode_pos = $request->kode_pos;
        $tempaan->no_hp = $request->no_hp;
        $tempaan->gambar1 = $imgName1;
        $tempaan->gambar2 = $imgName2;
        $tempaan->gambar3 = $imgName3;
        $tempaan->keterangan = $request->keterangan;
        $tempaan->jumlah = $request->jumlah;
        $tempaan->status_pemesanan = "Belum Dikirim";
        $tempaan->status_pembayaran = "Belum Dibayar";
        $tempaan->save();

        $tempaan_id = DB::getPdo()->lastInsertId();

        $id = $tempaan_id;


        return redirect('/viewtempaan/' . $id)->with('sukses', 'Tempaan berhasil direquest');
    }

    public function viewtempaan($id)
    {
        $user_id = Auth::user()->id;
        $tempaan = Tempaan::where('user_id', $user_id)->where('id', $id)->first();
        $tempaan1 = Tempaan::where('user_id', $user_id)->where('id', $id)->get();

        if (empty($tempaan)) {
            return redirect('/');
        }
        // $pesananpro = PemesananProduk::where('user_id', $user_id)->first();
        // // $pesananPro = PemesananProduk::where('')->first;
        return view('user.viewtempaan', compact(['tempaan', 'tempaan1']));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_tempaan' => 'required',
            'nama_penerima' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'no_hp' => 'required',
            'gambar1' => 'mimes:jpeg,png,jpg',
            'gambar2' => 'mimes:jpeg,png,jpg',
            'gambar3' => 'mimes:jpeg,png,jpg',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ]);
        $tempaan = Tempaan::find($id);
        $tempaan->update($request->all());

        if ($request->hasFile('gambar1')) {
            $imgName1 = $request->gambar1->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar1->extension();

            $request->gambar1->move(public_path('tempaan'), $imgName1);

            $tempaan->gambar1 = $imgName1;
            $tempaan->save();
        }

        if ($request->hasFile('gambar2')) {
            $imgName2 = $request->gambar2->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar2->extension();

            $request->gambar2->move(public_path('tempaan'), $imgName2);

            $tempaan->gambar2 = $imgName2;
            $tempaan->save();
        }

        if ($request->hasFile('gambar3')) {
            $imgName3 = $request->gambar3->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar3->extension();

            $request->gambar3->move(public_path('tempaan'), $imgName3);

            $tempaan->gambar3 = $imgName3;
            $tempaan->save();
        }


        return back()->with('sukses', 'Data tempaan berhasil diupdate');
    }

    public function pesanan()
    {
        $tempaan = Tempaan::latest()->paginate(5);
        return view('user.pesanantempaan', compact(['tempaan']));
    }

    public function dettempaan($id)
    {
        $det_tempaan = Tempaan::where('id', $id)->first();

        return view('admin.detailtempaan', compact(['det_tempaan']));
    }
    public function buatbiaya(Request $request, $id)
    {

        $this->validate($request, [
            'biaya' => 'required',

        ]);
        $tempaan = Tempaan::find($id);
        $tempaan->biaya = str_replace(".", "", $request->biaya);
        $tempaan->save();


        $notif = new Notifikasi;
        $notif->user_id = $tempaan->user_id;
        $notif->isi =  "Cek Biaya tempaan <br>" . $tempaan->nama_tempaan . " Anda";
        $notif->save();

        return back()->with('sukses', 'Biaya tempaan berhasil dibuat');
    }
    public function pembayaran($id)
    {
        $user_id = Auth::user()->id;

        $tempaan = Tempaan::where('user_id', $user_id)->where('id', $id)->first();
        $tempaan1 = Tempaan::where('user_id', $user_id)->where('id', $id)->get();

        if (empty($tempaan)) {
            return redirect('/');
        }
        // $pesananpro = PemesananProduk::where('user_id', $user_id)->first();
        // // $pesananPro = PemesananProduk::where('')->first;
        return view('user.paytempaan', compact(['tempaan', 'tempaan1']));
    }
    public function checkouttempaan(Request $request, $id)
    {
        $tempaan = Tempaan::find($id);
        $tempaan->transfer_bank = $request->transfer_bank;
        $tempaan->total_biaya = $request->total_biaya;
        $tempaan->save();

        return redirect('/konfirmtempaan/' . $id);
    }
    public function konfirmtempaan($id)
    {
        $user_id = Auth::user()->id;


        $tempaan = Tempaan::where('user_id', $user_id)->where('id', $id)->first();

        if (empty($tempaan)) {
            return redirect('/');
        }
        // $pesananpro = PemesananProduk::where('user_id', $user_id)->first();
        // // $pesananPro = PemesananProduk::where('')->first;
        return view('user.konfirmasitempaan', compact(['tempaan']));
    }

    public function buktitempaan(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'nama' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg'
        ]);

        $imgName = $request->gambar->getClientOriginalName() . '-' . time()
            . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('buktipembayaran'), $imgName);
        $id = $request->tempaan_id;
        $bukti = new BuktiPembayaranTempaan;
        $bukti->tempaan_id = $id;
        $bukti->nama_pengirim = $request->nama;
        $bukti->tanggal_dikirim = $request->tanggal;
        $bukti->gambar = $imgName;
        $bukti->save();
        DB::table('tempaan')->where('id', $id)->update(['status_pembayaran' => 'Sudah Dibayar']);

        return redirect('/terimakasih/' . $id)->with('sukses', 'Berhasil Upload Bukti Pembayaran');
    }


    public function konfirmasitempaan($id)
    {
        Tempaan::where('id', $id)->update(['status_pemesanan' => 'Dikirim']);
        $tempaan =  Tempaan::where('id', $id)->first();


        $notif = new Notifikasi;
        $notif->user_id = $tempaan->user_id;
        $notif->isi = "Tempaan anda dikonfirmasi <br> dengan No order #" . $tempaan->id;
        $notif->save();


        //  User::find($pemesanan->user_id)->notify(new InvoicePaid);
        return redirect()->back()->with('sukses', 'Tempaan Dikonfirmasi');
    }
    public function batalkonfirmasi($id)
    {
        Tempaan::where('id', $id)->update(['status_pemesanan' => 'Batal Dikirim']);
        return redirect()->back()->with('sukses', 'Produk Batal Dikonfirmasi');
    }
}