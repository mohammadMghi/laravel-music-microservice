<?php

namespace App\Domain\Auth\Contracts;

use App\Domain\Auth\DTOs\LoginData;
use App\Domain\Auth\DTOs\RegisterData;

interface IAuthenticationService
{
    public function register(RegisterData $data);

    public function login(LoginData $data);
}