<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        $teste = URL::temporarySignedRoute(
            'login', now()->addSeconds(20)
        );
        return view('pages.home.index', compact('teste'));
    }
}
