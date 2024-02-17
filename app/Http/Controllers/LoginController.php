<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
}
