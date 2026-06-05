<?php

namespace App\Domain\Auth\Traits;

use App\Models\User;
use File;
use Firebase\JWT\JWT; 
use Firebase\JWT\Key; 

trait JWTManager
{
    public function makeToken(User $user)
    {
        $privateKey = File::get(storage_path('oauth-private.key'));

        $payload = [
            'iss' => 'http://user.localhost',
            'aud' => 'http://music.localhost',
            'iat' => time(),
            'exp' => time() + (60 * 60 * 24),
            'sub' => $user->id,  
            'roles' => ['user', 'premium'],  
        ];

        return JWT::encode($payload,$privateKey,'RS256');
    }
}