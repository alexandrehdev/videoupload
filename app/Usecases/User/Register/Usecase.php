<?php

namespace App\Usecases\User\Register;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Usecase{

    public function execute(Input $input)
    {
        $user = new User();

        $user->name = $input->name;
        $user->email = $input->email;
        $user->password = Hash::make($input->password);


        $user->save();

        $user->setViewerRole();

    }
}