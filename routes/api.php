<?php

use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// authentication http requests
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [UserController::class, 'logout']);
});

// images http requests
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/image/create', [ImageController::class, 'create']);
});