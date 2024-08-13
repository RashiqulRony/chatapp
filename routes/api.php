<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiAuthCheck;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ChatController;

Route::get('/', function () {
   echo "API is worked";
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

# Authentication routes...
Route::group(['middleware' => [ApiAuthCheck::class, 'jwt.auth']], function () {
    # For Auth Routes...
    Route::get('me', [AuthController::class, 'me']);
    Route::get('refresh-token', [AuthController::class, 'refreshToken']);
    Route::post('logout', [AuthController::class, 'logout']);

    #For Users Routes...
    Route::get('get-users', [UserController::class, 'getUsers']);
    Route::post('update-profile', [UserController::class, 'updateProfile']);

    #For Chat Routes...
    Route::post('create-room', [ChatController::class, 'createRoom']);
    Route::get('get-chat-lists', [ChatController::class, 'getChatLists']);
    Route::post('get-chat-info', [ChatController::class, 'getChatInfo']);
});
