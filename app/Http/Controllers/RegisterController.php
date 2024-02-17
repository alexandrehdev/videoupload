<?php

namespace App\Http\Controllers;

use App\Usecases\User\Register\Usecase as CreateUser;
use App\Usecases\User\Register\Input as UserInput;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmEmail;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(RegisterRequest $request, CreateUser $create_user)
    {
        $user = $request->validated();

        $user = $create_user->execute(
            new UserInput(
                $user['name'],
                $user['email'],
                Storage::url('public/random-profile/' . random_profile() . '.png'),
                $user['password'],
            )
        );

        event(new Registered($user));

        return back()->with('message','Uma confirmação de conta foi enviada para seu email.');
    }
}
