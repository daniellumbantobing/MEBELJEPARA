<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'user')->paginate(10);

        return view('admin.userlist', compact(['user']));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('sukses', 'Data user berhasil dihapus');
    }

    public function profil()
    {

        $profil = User::where('id', Auth::user()->id)->first();
        return view('user.profil', compact(['profil']));
    }
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'no_hp' => 'required'
        ]);
        $user->update($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Diupdate');
    }
}