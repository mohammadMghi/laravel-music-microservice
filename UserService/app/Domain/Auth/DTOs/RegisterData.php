<?php

namespace App\Domain\Auth\DTOs;

class RegisterData
{
    public function __construct(
        public $email,
        public $password
    ){}
}