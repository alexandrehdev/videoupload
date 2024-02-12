<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index()
    {
        return view("pages.auth.login");
    }

    public function authenticate(LoginRequest $request) 
    {
        $user_loggin = $request->validated();

        if(!Auth::attempt($user_loggin)){
            return back()->with('error', 'Usuário ou senha inválido!');
        }

        return redirect()->route('show');
    }
}
