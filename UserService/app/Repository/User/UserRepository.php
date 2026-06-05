<?php 

namespace App\Repository\User;

use App\Models\User;
use App\Repository\User\DTOs\CreateUserData;

class UserRepository implements IUserRepository
{
    public function findById($userId)
    {
        return User::find($userId);
    }

    public function findByEmail($email)
    {
        return User::where('email' , $email)->first();
    }

    public function create(CreateUserData $data)
    { 
        return User::create($data->toArray());
    }
}