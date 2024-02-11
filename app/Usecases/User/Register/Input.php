<?php

namespace App\Usecases\User\Register;

class Input
{

   /**
    * Constructor function
    *
    * @param string $name
    * @param string $email
    * @param string $password
    */
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    ){}
   
}