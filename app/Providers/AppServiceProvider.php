<?php

namespace App\Providers;

use App\Repository\BaseRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Eloquent\FilmRepository;
use App\Repository\Eloquent\PlanetRepository;
use App\Repository\Eloquent\UserRepository;
use App\Repository\Eloquent\StarshipRepository;
use App\Repository\Eloquent\VehicleRepository;
use App\Repository\Eloquent\SpecieRepository;
use App\Repository\FilmRepositoryInterface;
use App\Repository\PlanetRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use App\Repository\SpecieRepositoryInterface;
use App\Repository\StarshipRepositoryInterface;
use App\Repository\VehicleRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(FilmRepositoryInterface::class, FilmRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(PlanetRepositoryInterface::class, PlanetRepository::class);
        $this->app->bind(SpecieRepositoryInterface::class, SpecieRepository::class);
        $this->app->bind(StarshipRepositoryInterface::class, StarshipRepository::class);
        $this->app->bind(VehicleRepositoryInterface::class, VehicleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
