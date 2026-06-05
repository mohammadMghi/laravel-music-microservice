<?php

namespace App\Domain\Auth\DTOs;

class LoginData
{
    public function __construct(
        public $email,
        public $password
    ){}
}