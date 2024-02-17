<?php

namespace App\Usecases\User\Update;
use App\Models\User;

class Input
{

    public function __construct(
        public string $name,
        public ?string $email,
        public ?string $password,
        public int $user_id
    ){}
}