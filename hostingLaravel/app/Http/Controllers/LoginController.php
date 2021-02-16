<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(request $request)
    {
        if(!Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
			return redirect()->back()->withErrors(['Email ou mot de passe incorrecte']);
        }
        	return redirect('/');
    }
}
