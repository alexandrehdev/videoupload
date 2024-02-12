<?php

namespace App\Http\Controllers;

use App\Usecases\User\Register\Usecase as CreateUser;
use App\Usecases\User\Register\Input as UserInput;
use App\Http\Requests\User\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(RegisterRequest $request, CreateUser $create_user)
    {
        $user = $request->validated();

        
        $create_user->execute(
            new UserInput(
                $user['name'],
                $user['email'],
                $user['password'],
            )
        );

        return back()->with('message','Conta Cadastrada.');
    }
}
