<?php

namespace App\Repository\User;

use App\Repository\User\DTOs\CreateUserData;

interface IUserRepository
{
    public function findById($userId);
    public function findByEmail($email);
    public function create(CreateUserData $data);
}