<?php

if (! function_exists('csrf_token')) {
    /**
     * Get the CSRF token value.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    function csrf_token()
    {
        $session = app('session');

        if (isset($session)) {
            return $session->token();
        }

        throw new RuntimeException('Application session store not set.');
    }
}


if (! function_exists('random_profile')) {
    /**
     * Get a random profile picture from storage profile folder.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    function random_profile()
    {
        $profile_path = "app/public/random-profile";

        $folder_content = scandir(storage_path($profile_path));

        $images_list = array_slice($folder_content,2);
        
        return array_rand($images_list);
    }
}


if(!function_exists("loggedUser")){
    function loggedUser(): ?\App\Models\User
    {   /** @var \App\Models\User $logged_user */
        $logged_user = \Illuminate\Support\Facades\Auth::user();
        return $logged_user;
    }
}

