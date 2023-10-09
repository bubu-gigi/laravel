<?php

namespace App\Providers;

use App\Repository\BaseRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Eloquent\FilmRepository;
use App\Repository\Eloquent\ResidentRepository;
use App\Repository\FilmRepositoryInterface;
use App\Repository\ResidentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FilmRepositoryInterface::class, FilmRepository::class);
        $this->app->bind(ResidentRepositoryInterface::class, ResidentRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
