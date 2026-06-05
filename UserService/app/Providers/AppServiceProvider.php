<?php

namespace App\Providers;

use App\Domain\Auth\Contracts\IAuthenticationService;
use App\Domain\Auth\Domain\AuthenticationService;  
use App\Repository\User\IUserRepository;
use App\Repository\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class,UserRepository::class);
        $this->app->bind(IAuthenticationService::class,AuthenticationService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
