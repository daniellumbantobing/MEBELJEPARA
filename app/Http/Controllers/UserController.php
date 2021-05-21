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
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nama_kota' => 'required',
            'nama_prov' => 'required',
            'kode_pos' => 'required'
        ]);
        $user->update($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Diupdate');
    }

    public function about()
    {
        return view('dashboard.aboutus');
    }
    public function admin()
    {

        $profil = User::where('id', Auth::user()->id)->first();
        return view('admin.profil', compact(['profil']));
    }
    public function editprofil()
    {

        $profil = User::where('id', Auth::user()->id)->first();
        return view('admin.editprofil', compact(['profil']));
    }


    public function updateadmin(Request $request, $id)
    {
        $this->validate($request, [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required',
            'no_hp' => 'required|digits_between:9,20',
            'jenis_kelamin' => 'required',
            'avatar' => 'mimes:jpg,png,jpeg'

        ]);
        $profil = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $imgName = $request->avatar->getClientOriginalName() . '-' . time()
                . '.' . $request->avatar->extension();

            $request->avatar->move(public_path('avatar'), $imgName);
            $profil->avatar = $imgName;
        }


        $profil->nama_depan = $request->nama_depan;
        $profil->nama_belakang = $request->nama_belakang;
        $profil->jenis_kelamin = $request->jenis_kelamin;
        $profil->no_hp = $request->no_hp;
        $profil->email = $request->email;
        $profil->save();

        return redirect('/myprofil')->with('sukses', 'Data Berhasil Diupdate');
    }
}