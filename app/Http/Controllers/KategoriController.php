<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->paginate(10);
        return view('admin.kategori', compact(['kategori']));
    }
    public function createkategori(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->back()->with('sukses', 'Berhasil Menambahkan Kategori');
    }
    public function hapus($id)
    {
        Kategori::find($id)->delete();
        return back()->with('sukses', 'Data kategori berhasil dihapus');
    }
    public function update(Request $request, Kategori $kategori)
    {
        $this->validate($request, [

            'nama_kategori' => 'required'
        ]);
        $kategori->update($request->all());
        return back()->with('sukses', 'Data kategori berhasil diupdate');
    }

    public function produk($url = null, Request $request)
    {
        $countCategory = Kategori::where(['nama_kategori' => $url])->count();
        if ($countCategory == 0) {
            abort(404);
        }

        $categoryDetails = Kategori::where(['nama_kategori' => $url])->first();

        $produk = Produk::where(['kategori_id' => $categoryDetails->id])->paginate(9);
        if ($request->has('terendah')) {
            $produk = Produk::where(['kategori_id' => $categoryDetails->id])->orderby('harga', 'ASC')->paginate(9);
        }
        if ($request->has('tertinggi')) {
            $produk = Produk::where(['kategori_id' => $categoryDetails->id])->orderby('harga', 'DESC')->paginate(9);
        }

        return view('listproduk', compact(['categoryDetails', 'produk']));
    }

    public function katalog($url = null, Request $request)
    {
        // $countCategory = Kategori::where(['nama_kategori' => $url])->count();
        // if ($countCategory == 0) {
        //     abort(404);
        // }

        // $categoryDetails = Kategori::where(['nama_kategori' => $url])->first();

        $produk = Produk::paginate(9);
        if ($request->has('terendah')) {
            $produk = Produk::orderby('harga', 'ASC')->paginate(9);
        }
        if ($request->has('tertinggi')) {
            $produk = Produk::orderby('harga', 'DESC')->paginate(9);
        }

        return view('dashboard.katalog', compact(['produk']));
    }
}