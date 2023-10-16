<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\StarshipController;
use App\Http\Controllers\SpecieController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'show');
    Route::get('/users/{id}', 'get');
    Route::post('/users', 'store');
    Route::delete('/users/{id}', 'delete');
    Route::put('/users/{id}', 'update');
});

Route::controller(FilmController::class)->group(function () {
    Route::get('/films', 'show');
    Route::get('/films/{id}', 'get');
    Route::post('/films', 'store');
    Route::delete('/films/{id}', 'delete');
    Route::put('/films/{id}', 'update');
});

Route::controller(PlanetController::class)->group(function () {
    Route::get('/planets', 'show');
    Route::get('/planets/{id}', 'get');
    Route::post('/planets', 'store');
    Route::delete('/planets/{id}', 'delete');
    Route::put('/planets/{id}', 'update');
});

Route::controller(SpecieController::class)->group(function () {
    Route::get('/species', 'show');
    Route::get('/species/{id}', 'get');
    Route::post('/species', 'store');
    Route::delete('/species/{id}', 'delete');
    Route::put('/species/{id}', 'update');
});

Route::controller(StarshipController::class)->group(function () {
    Route::get('/starships', 'show');
    Route::get('/starships/{id}', 'get');
    Route::post('/starships', 'store');
    Route::delete('/starships/{id}', 'delete');
    Route::put('/starships/{id}', 'update');
});

Route::controller(VehicleController::class)->group(function () {
    Route::get('/vehicles', 'show');
    Route::get('/vehicles/{id}', 'get');
    Route::post('/vehicles', 'store');
    Route::delete('/vehicles/{id}', 'delete');
    Route::put('/vehicles/{id}', 'update');
});






