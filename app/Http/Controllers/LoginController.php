<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loguear(Request $request){
        $credentials = $request->validate([
            'name' => '',
            'email'=> '',
            'password' => ['required'],
        ]);

        if (Auth::check()) {
            return 'Logeado';
        }


        if(Auth::attempt($credentials)){
            $token = Auth::user()->createToken('Token')->accessToken;
            return $token;
        }
        return 'Algo ha fallado';
    }

    public function info(){
        return Auth::user();
    }
}
