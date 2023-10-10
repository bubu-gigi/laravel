<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('test');
});

Route::get('/users', [UserController::class, 'show']);

Route::get('/users/{id}', [UserController::class, 'get']);

Route::post('/users/insert/{user}', [UserController::class, 'insert']);

Route::delete('/users/delete/{id}', [UserController::class, 'delete']);
