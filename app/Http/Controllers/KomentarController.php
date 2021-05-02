<?php

namespace App\Http\Controllers;

use App\Komentar;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{

    public function index()
    {
        $komen = Komentar::latest()->paginate(10);
        return view('admin.feedback', compact(['komen']));
    }


    public function create(Request $request, $id)
    {

        $this->validate($request, [
            'komentar' => 'required'
        ]);

        $komen = new Komentar;
        $komen->user_id = Auth::user()->id;
        $komen->produk_id = $id;
        $komen->komentar = $request->komentar;
        $komen->save();

        return redirect()->back()->with('sukses', 'Berhasil memberi feedback');
    }

    public function destroy($id)
    {
    }
}