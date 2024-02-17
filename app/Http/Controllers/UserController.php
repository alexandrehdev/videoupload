<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\User\Profile\UpdateRequest;
use App\Usecases\User\Update\Usecase as UpdateUser;
use App\Usecases\User\Update\Input as UpdateUserInput;


class UserController extends Controller
{
    public function profile()
    {
        return view('pages.profile.show');
    }

    public function updateProfile(UpdateRequest $request, int $user_id, UpdateUser $userUpdate)
    {
        $data = $request->validated();
        
        $update_user_input = new UpdateUserInput(
            $data["name"],
            $data["email"],
            $data["password"],
            $user_id
        );

        $userUpdate->execute($update_user_input);

        return back()->with('notification',"Perfil atualizado.");
    }
}
