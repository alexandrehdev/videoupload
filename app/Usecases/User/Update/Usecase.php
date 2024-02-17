<?php

namespace App\Usecases\User\Update;

use App\Usecases\User\Update\Input;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class Usecase
{
    public function execute(Input $input)
    {
        $user = User::find($input->user_id);

        $user->name = $input->name;

        $user->email = $input->email;

        $user->password = Hash::make($input->password);

        $user->save();

    }
}