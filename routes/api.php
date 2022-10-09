<?php

use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// authentication http requests
Route::post('/register', [UserController::class, 'register']); // done
Route::post('/login', [UserController::class, 'login']); // done

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [UserController::class, 'logout']); // done
});

// images http requests
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/image/create', [ImageController::class, 'create']); // done
    Route::get('/image/listall', [ImageController::class, 'listAllImages']); // done
    Route::get('/image/listuser', [ImageController::class, 'listUserImages']); // done
    Route::delete('/image/delete/{id}', [ImageController::class, 'delete']); // done
    Route::patch('/image/update/{id}', [ImageController::class, 'update']); // done
});