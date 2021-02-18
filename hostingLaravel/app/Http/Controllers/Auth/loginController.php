<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(request $request)
    {
        if(!Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {

            // dd("here");
			return redirect()->back()->withErrors(['Email ou mot de passe incorrecte']);
        }
        	return redirect('/index');
    }
}
