<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    public function register(){
        return view('auths.register');
    }
    public function postregister(Request $request){
        $this->validate($request,[
                'nama_depan' => 'required|min:3',
                'nama_belakang' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5',
                'avatar' => 'mimes:jpeg,png'
        ]);
            
        $user = new User;
        $user->nama_depan = $request->nama_depan; 
        $user->nama_belakang = $request->nama_belakang;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->nama_prov = $request->nama_prov;
        $user->nama_kota = $request->nama_kota;
        $user->alamat = $request->alamat;
        $user->role = 'user';
        $user->password = bcrypt($request->password);
        $user->remember_token =Str::random(60);
        $user->save();
        return redirect('/register')->with('sukses','pendaftaran berhasil');    

    }
}
