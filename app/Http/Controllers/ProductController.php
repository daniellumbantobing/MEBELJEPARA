<?php

namespace App\Http\Controllers;

use Alert;
use App\BuktiPembayaran;
use App\User;
use App\Kategori;
use App\Cart;
use App\Komentar;
use App\Notifications\InvoicePaid;
use App\Notifikasi;
use App\Pemesanan;
use App\PemesananProduk;
use App\Produk;
use App\Reparasi;
use App\Tempaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->paginate(10);
        $kategori = Kategori::all();
        return view('admin.produk', compact(['kategori', 'produk']));
    }

    public function createproduk(Request $request)
    {

        $this->validate($request, [
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg'
        ]);

        $imgName = $request->gambar->getClientOriginalName() . '-' . time()
            . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('images'), $imgName);

        $produk = new Produk;
        $produk->kategori_id = $request->kategori_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->qty = $request->qty;
        $produk->harga = str_replace(".", "", $request->harga);
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori_id = $request->kategori_id;
        $produk->gambar = $imgName;
        $produk->save();

        return redirect()->back()->with('sukses', 'Berhasil Menambahkan Produk');
    }

    public function hapus($id)
    {
        Produk::find($id)->delete();
        return back()->with('sukses', 'Data produk berhasil dihapus');
    }
    public function update(Request $request, Produk $produk)
    {
        $this->validate($request, [
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg'
        ]);


        $produk = Produk::find($produk->id);
        $produk->kategori_id = $request->kategori_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->qty = $request->qty;
        $produk->harga = str_replace(".", "", $request->harga);
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori_id = $request->kategori_id;
        $produk->save();

        if ($request->hasFile('gambar')) {
            $imgName = $request->gambar->getClientOriginalName() . '-' . time()
                . '.' . $request->gambar->extension();

            $request->gambar->move(public_path('images'), $imgName);

            $produk->gambar = $imgName;
            $produk->save();
        }


        return back()->with('sukses', 'Data produk berhasil diupdate');
    }

    public function detail($id)
    {
        $produk = Produk::find($id);
        // if (!Auth::check()) {
        //     return redirect('/login')->with('error', "Anda login dulu");
        // }

        $komentar = Komentar::where(['produk_id' => $id])->get();


        return view('user.detail', compact(['produk', 'komentar']));
    }

    public function addtocart(Request $request, $id)
    {
        $produk = Produk::where('id', $id)->first();
        $data = $request->all();
        if (empty(Auth::user()->id)) {
            $data['user_id'] =  null;
        } else {
            $data['user_id'] = Auth::user()->id;
        }
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = Str::random(40);
            Session::put('session_id', $session_id);
        }


        if (empty(Auth::user()->id)) {
            $countProducts = DB::table('cart')->where(['produk_id' => $produk->id, 'session_id' => $session_id])->count();
        } else {
            $countProducts = DB::table('cart')->where(['produk_id' => $produk->id, 'user_id' => Auth::user()->id])->count();
        }

        if ($countProducts > 0) {
            if (Auth::check()) {
                $cartproduk = Cart::where('produk_id', $produk->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $cartproduk = Cart::where('produk_id', $produk->id)->where('session_id', $session_id)->first();
            }
            $cartproduk->qty = $cartproduk->qty + $request->qty;
            $cartproduk->update();
            return redirect('/cart')->with('cart', 'Produk berhasil dimasukkan ke keranjang');
        } else {


            $cart = new Cart;
            $cart->nama_produk = $produk->nama_produk;
            $cart->qty = $request->qty;
            $cart->user_id = $data['user_id'];
            $cart->produk_id = $produk->id;
            $cart->harga = $produk->harga;
            $cart->session_id = $session_id;
            $cart->save();
        }

        return redirect('/cart')->with('cart', 'Produk berhasil dimasukan kekeranjang');
    }

    public function cart()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userCart = Cart::where(['user_id' => $user_id])->get();
        } else {
            $session_id = Session::get('session_id');
            $userCart = Cart::where(['session_id' => $session_id])->get();
        }


        return view('user.cart')->with(compact('userCart'));
    }

    public function delete($id)
    {
        Cart::find($id)->delete();
        return back()->with('sukses', 'Produk berhasil dihapus dari keranjang');
    }

    public function pembayaran()
    {


        $user = User::where('id', Auth::user()->id)->first();
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        if (empty($user->alamat)) {

            return back()->with('error', 'Silahkan Isi Alamt Anda');
        }
        return view('user.pay', compact(['cart', 'user']));
    }

    public function checkout(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', Auth::user()->id)->first();
        $pesanan = new Pemesanan;
        $pesanan->user_id = $user->id;
        $pesanan->total_harga = $data['total_harga'];
        $pesanan->nama_prov = $user->nama_prov;
        $pesanan->nama_kota = $user->nama_kota;
        $pesanan->alamat = $user->alamat;
        $pesanan->kode_pos = $user->kode_pos;
        $pesanan->no_hp = $user->no_hp;
        $pesanan->transfer_bank = $data['transfer_bank'];
        $pesanan->status_pemesanan = "Belum Dikirim";
        $pesanan->status_pembayaran = "Belum Dibayar";
        $pesanan->save();


        $pemesanan_id = DB::getPdo()->lastInsertId();
        $cart = DB::table('cart')->where('user_id', Auth::user()->id)->get();

        foreach ($cart as $c) {
            $pesananPro = new PemesananProduk;
            $pesananPro->pemesanan_id = $pemesanan_id;
            $pesananPro->user_id = $user->id;
            $pesananPro->produk_id = $c->produk_id;
            $pesananPro->nama_produk = $c->nama_produk;
            $pesananPro->qty = $c->qty;
            $pesananPro->harga = $c->harga;
            $pesananPro->save();

            $produk = Produk::find($c->produk_id);
            $produk->qty = $produk->qty - $c->qty;
            $produk->save();


            $notif = new Notifikasi;
            $notif->user_id = 1;
            $notif->isi =  $user->nama_depan . " Memesan " . $c->nama_produk;
            $notif->id_notif = 1;
            $notif->status = 1;
            $notif->save();
        }



        $id = $pemesanan_id;
        // Session::put('pemesanan_id', $pemesanan_id);
        // Session::put('total_harga', $data['total_harga']);
        return redirect('/konfirm/' . $id);
    }

    public function konfirm($id)
    {
        $user_id = Auth::user()->id;
        DB::table('cart')->where('user_id', $user_id)->delete();
        $pesananpro = PemesananProduk::where('user_id', $user_id)->where('pemesanan_id', $id)->first();
        $pesananpro1 = PemesananProduk::where('user_id', $user_id)->where('pemesanan_id', $id)->get();

        if (empty($pesananpro)) {
            return redirect('/');
        }
        // $pesananpro = PemesananProduk::where('user_id', $user_id)->first();
        // // $pesananPro = PemesananProduk::where('')->first;
        return view('user.konfirmasi', compact(['pesananpro', 'pesananpro1']));
    }
    public function bukti(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'nama' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg'
        ]);

        $imgName = $request->gambar->getClientOriginalName() . '-' . time()
            . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('buktipembayaran'), $imgName);
        $id = $request->pemesanan_id;
        $bukti = new BuktiPembayaran;
        $bukti->pemesanan_id = $id;
        $bukti->nama_pengirim = $request->nama;
        $bukti->tanggal_dikirim = $request->tanggal;
        $bukti->gambar = $imgName;
        $bukti->save();
        DB::table('pemesanan')->where('id', $id)->update(['status_pembayaran' => 'Sudah Dibayar']);

        $notif = new Notifikasi;
        $notif->user_id = 1;
        $notif->isi =  Auth()->user()->nama_depan . " telah membayar pesanan<br> dengan No order #" . $id;
        $notif->id_notif = 1;
        $notif->status = 1;
        $notif->save();

        return redirect('/terimakasih/' . $id)->with('sukses', 'Berhasil Upload Bukti Pembayaran');
    }
    public function terimakasih($id)
    {
        $bukti = BuktiPembayaran::where("pemesanan_id", $id)->first();
        return view('user.terimakasih', compact(['bukti']));
    }

    public function listOrder()
    {
        $p_biasa = Pemesanan::latest()->paginate(10);
        //dd($p_biasa);

        return view('admin.pemesananBiasa', compact(['p_biasa']));
    }

    public function konfirmasipemesanan($id)
    {
        Pemesanan::where('id', $id)->update(['status_pemesanan' => 'Dikirim']);
        $pemesanan =  Pemesanan::where('id', $id)->first();
        $notif = new Notifikasi;
        $notif->user_id = $pemesanan->user_id;
        $notif->isi = "Pesanan anda dikonfirmasi <br> dengan No order #" . $pemesanan->id;
        $notif->status = 1;
        $notif->save();


        //  User::find($pemesanan->user_id)->notify(new InvoicePaid);
        return redirect()->back()->with('sukses', 'Produk Dikonfirmasi');
    }
    public function konfirmasipemesanan1($id)
    {
        Pemesanan::where('id', $id)->update(['status_pemesanan' => 'Batal Dikirim']);
        return redirect()->back()->with('sukses', 'Produk Batal Dikonfirmasi');
    }

    public function detpro($id)
    {
        $det_pes = Pemesanan::where('id', $id)->first();

        return view('admin.detailpemesanan', compact(['det_pes']));
    }

    public function download($gambar)
    {
        return response()->download('buktipembayaran/' . $gambar);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        //$produk = Produk::where('nama_produk', 'LIKE', '%' . $cari . '%')->paginate(9);
        $produk = DB::table('produk')->join('kategori', 'kategori.id', '=', 'produk.kategori_id')
            ->select('produk.*', 'kategori.nama_kategori')
            ->where('nama_produk', 'LIKE', '%' . $cari . '%')
            ->orwhere('nama_kategori', 'LIKE', '%' . $cari . '%')->paginate(9);

        return view('result', compact(['produk', 'cari']));
    }

    public function listpes(Pemesanan $pemesanan)
    {

        $p_biasa = Pemesanan::where(['user_id' => auth()->user()->id])->latest()->paginate(5);

        $p_biasa1 = Pemesanan::where(['user_id' => auth()->user()->id, 'status_pemesanan' => 'Dikirim'])->latest()->paginate(5);
        $p_biasa2 = Pemesanan::where(['user_id' => auth()->user()->id, 'status_pemesanan' => 'Batal Dikirim'])->latest()->paginate(5);
        //Tempaan
        $tempaan = Tempaan::where(['user_id' => auth()->user()->id])->latest()->paginate(5);
        $tempaan1 = Tempaan::where(['user_id' => auth()->user()->id, 'status_pemesanan' => 'Dikirim'])->latest()->paginate(5);
        //Reparasi
        //Tempaan
        $reparasi = Reparasi::where(['user_id' => auth()->user()->id])->latest()->paginate(5);
        $reparasi1 = Reparasi::where(['user_id' => auth()->user()->id, 'status_pemesanan' => 'Dikirim'])->latest()->paginate(5);


        $profil = User::where('id', Auth::user()->id)->first();
        return view('user.pemesanan', compact(['profil', 'p_biasa', 'p_biasa1', 'p_biasa2', 'tempaan', 'tempaan1', 'reparasi', 'reparasi1']));
    }

   
}