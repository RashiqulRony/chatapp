<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthCheck;
use App\Http\Controllers\Api\AuthController;

Route::get('/', function () {
   echo "API is worked";
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

# Authentication routes...
Route::group(['middleware' => [ApiAuthCheck::class, 'jwt.auth']], function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::get('refresh-token', [AuthController::class, 'refreshToken']);
    Route::post('logout', [AuthController::class, 'logout']);
});
