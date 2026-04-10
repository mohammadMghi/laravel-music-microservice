<?php

namespace App\Domain\Auth\Contracts;

interface IAuthenticationService
{
    public function register();

    public function login();
}