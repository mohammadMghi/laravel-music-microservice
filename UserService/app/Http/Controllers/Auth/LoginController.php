<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Auth\Contracts\IAuthenticationService;
use App\Domain\Auth\DTOs\LoginData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        protected IAuthenticationService $authService
    ){}

    public function __invoke(Request $request)
    { 
        $request->validate([
            'password' => 'required|string',
            'email' => 'required|email'
        ]);

        return $this->authService->login(
            new LoginData(
                $request->email,
                $request->password
            )
        );
    }
}
