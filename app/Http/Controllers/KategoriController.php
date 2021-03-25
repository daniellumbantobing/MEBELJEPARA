<?php

namespace App\Http\Controllers;

use App\Kategori;
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
}