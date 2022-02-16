<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrarTokenController extends Controller
{
    public function borrarToken(){
      Auth::user()->token()->revoke();
      return 'Cerrado sesion';
    }
}
