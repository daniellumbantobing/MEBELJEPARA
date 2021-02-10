<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::where('role','user')->paginate(10);

        return view('admin.userlist',compact(['user']));
    }

    public function destroy($id){
        User::find($id)->delete();
        return back()->with('sukses','Data user berhasil dihapus');
    }
}
