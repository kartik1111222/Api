<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function admin_login(Request $request){
        
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::guard('admin')->attempt($credetials)) {
             $admin = Auth::guard('admin')->user();
            
             $token = $admin->createToken('Token')->accessToken;

             return response()->json([
                'status' => 'success',
                'message' => 'logged in successfully!',
                'token' => $token
             ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'wrong credentials',
             ]);
        }
    }
}
