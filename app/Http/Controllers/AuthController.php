<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{


    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }


    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request, [

            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::where('email', $request->email)->first();
            if ($user->role == 'user') {

                if (!empty(Session::get('session_id'))) {
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id', $session_id)->update(['user_id' => Auth::user()->id]);
                }
                return redirect('/');
            } else if ($user->role == 'admin') {
                return redirect('/home/admin');
            }
        } else {
            $user = User::where('email', $request->email)->pluck('email', 'password')->first();
            if ($user != $request->email) {
                return back()->with('error', 'Email tidak sesuai!');
            } elseif ($user != $request->password) {
                return back()->with('error', 'Password tidak sesuai!');
            } else {
                return back()->with('error', 'Password dan Email tidak sesuai!');
            }
        }
    }
}