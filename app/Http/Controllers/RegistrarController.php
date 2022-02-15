<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrarController extends Controller
{
    public function registrar(Request $request){

        $data = $request->only('name', 'email', 'password');
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($request->password);

        try {
            DB::table('users')->insert($data);
            return $data;
        }catch (\Exception $e){
            return 'Error, el usuario ya está insertado en la base de datos';
        }

    }

}
