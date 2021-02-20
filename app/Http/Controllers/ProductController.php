<?php

namespace App\Http\Controllers;


use App\Kategori;
use App\Cart;
use App\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $produk = Produk::paginate(10);
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
        $produk->harga = $request->harga;
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
        $produk->update($request->all());
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

        return view('user.detail', compact(['produk']));
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
                $cartproduk = Cart::where('produk_id', $produk->id)->first();
            }
            $cartproduk->qty = $cartproduk->qty + $request->qty;
            $cartproduk->update();
            return redirect('/cart')->with('sukses', 'Produk berhasuil dimasukkan ke keranjang');
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

        return redirect('/cart')->with('sukses', 'Produk berhasil dimasukan kekeranjang');
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
}