<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        Session::forget('session_id');
        return redirect('/login')->with('sukses', "Berhasil Logout");
    }
}