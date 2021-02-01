<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $produk = Produk::paginate(10);
        $kategori = Kategori::all();
        return view('admin.produk',compact(['kategori','produk']));
    }

    public function createproduk(Request $request){
    
        $this->validate($request,[
            'kategori_id' => 'required',
            'nama_produk' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg'
        ]);

        $imgName = $request->gambar->getClientOriginalName(). '-' . time()
                                            .'.'. $request->gambar->extension();

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

        return redirect()->back()->with('sukses','Berhasil Menambahkan Produk');
    }

    public function hapus($id){
       Produk::find($id)->delete();
       return back()->with('sukses','Data produk berhasil dihapus');
    }
    public function update(Request $request,Produk $produk){
        $produk->update($request->all());
        if($request->hasFile('gambar')){
         $imgName = $request->gambar->getClientOriginalName(). '-' . time()
                                            .'.'. $request->gambar->extension();

        $request->gambar->move(public_path('images'), $imgName);   
        
        $produk->gambar = $imgName;
        $produk->save();
        }

        
        return back()->with('sukses','Data produk berhasil diupdate');
    }
}
