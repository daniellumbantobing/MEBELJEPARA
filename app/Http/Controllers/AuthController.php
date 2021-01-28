<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{

    
    public function __construct(){
        
        $this->middleware('guest')->except('logout');
      }
   
      
    public function login(){
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
                $this->validate($request,[

            'email' => 'required',
            'password' => 'required'
                    ]);

    	if(Auth::attempt($request->only('email','password'))){	   	
            $user = User::where('email',$request->email)->first();
            if($user->role == 'user')  {
                return redirect('/user');
            } 
                return redirect('/home/admin');
            
            
    	 }else {
          return back()->with('sukses','Username atau password tidak sesuai!');
      }
    	
    }
  
}
