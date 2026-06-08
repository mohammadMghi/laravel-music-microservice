<?php

namespace App\Domain\Auth\Domain;

use App\Domain\Auth\Contracts\IAuthenticationService;
use App\Domain\Auth\DTOs\LoginData;
use App\Domain\Auth\DTOs\RegisterData; 
use App\Domain\Auth\Traits\JWTManager;  
use App\Domain\BaseService;
use App\Repository\User\DTOs\CreateUserData;
use App\Repository\User\IUserRepository;
use Hash; 

class AuthenticationService extends BaseService implements IAuthenticationService
{
    use JWTManager;

    public function __construct(
        protected IUserRepository $userRepo
    ){} 

    public function register(RegisterData $data)
    {
        $user = $this->userRepo->findByEmail($data->email); 
      
        if ($user) {
            return $this->faild("One account using this email was registred" , 403);
        }
        
        $user = $this->userRepo->create(new CreateUserData(
            $data->email,
            Hash::make($data->password)
        ));

        return $this->success($this->makeToken($user),200);
    }

    public function login(LoginData $data)
    {
        $user = $this->userRepo->findByEmail($data->email);

        if (!Hash::check($data->password , $user->password)) {
            return $this->faild('Authntication faild!' , 403);
        }

        return $this->success($this->makeToken($user));
    }
}