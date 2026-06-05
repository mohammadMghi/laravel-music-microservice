<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Auth\Contracts\IAuthenticationService;
use App\Domain\Auth\DTOs\RegisterData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(
        protected IAuthenticationService $authService
    ){}

    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        return $this->authService->register(new RegisterData(
            $request->email,
            $request->password
        )); 
    }
}
