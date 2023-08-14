<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function user_registration(Request $request){

        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $token = $user->createToken('Token')->accessToken;

        return response()->json([
         'status' => 'success',
         'message' => 'user registered successfully!',
         'token' => $token
        ]);
    }

    public function user_login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            $user = Auth()->user();
            $token = $user->createToken('Token')->accessToken;

            return response()->json([
              'status' => 'success',
              'message' => 'logged in successfully!',
              'token' => $token
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Wrong Credentials',
              ]);
        }
    }
}
