<?php

namespace App\Repository\User\DTOs;

class CreateUserData 
{
    public function __construct(
        public $email,
        public $password
    ){}

    public function toArray()
    {
        return [
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}