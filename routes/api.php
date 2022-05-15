<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user/{id}', [App\Http\Controllers\Api\UsersController::class, 'user'])->middleware([
    App\Http\Middleware\BasicAthenticationMiddleware::class
]);

Route::get('/users', [App\Http\Controllers\Api\UsersController::class, 'handle']);
Route::post('/users', [App\Http\Controllers\Api\UsersController::class, 'create']);
Route::put('/users/{id}', [App\Http\Controllers\Api\UsersController::class, 'update']);
Route::delete('/users/{id}', [App\Http\Controllers\Api\UsersController::class, 'delete']);
