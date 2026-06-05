<?php

namespace App\Providers;

use App\Domain\Search\Contracts\ISearchService;
use App\Domain\Search\Domain\SearchService;
use App\Repositories\Music\Contracts\IMusicRepo;
use App\Repositories\Music\MusicRepo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IMusicRepo::class, MusicRepo::class); 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
