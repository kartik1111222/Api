<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
      return view('login');
    }

    public function login_check(Request $request){
       if(Auth::attempt($request->only('email','password'))){
          $user = Auth::user();
          if($user->role == 'Admin'){
             return redirect()->route('admin.dashboard');
          }else{
            return redirect()->route('user.dashboard');
          }
       }else{
        return redirect()->route('login');
       }
    }

    public function logout(){
      Auth::logout();
      return redirect()->route('login');
    }

    public function dashboard(){
        return view('user.dashboard');
    }
}
