<?php

use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// authentication http requests
Route::post('/register', [UserController::class, 'register'])->name('register'); 
Route::post('/login', [UserController::class, 'login'])->name('login'); 

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::delete('/user/delete/', [UserController::class, 'delete'])->name('delete'); 
    Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('update');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('profile'); 
    Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 
});

// images http requests
Route::get('/image/list', [ImageController::class, 'listAllImages'])->name('listAll'); 

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/image/create', [ImageController::class, 'create'])->name('createImage'); 
    Route::get('/image/listmy', [ImageController::class, 'listMyImages'])->name('listMy'); 
    Route::get('/image/listother', [ImageController::class, 'listFavImages'])->name('listFav'); 
    Route::delete('/image/delete/{id}', [ImageController::class, 'delete'])->name('deleteImage'); 
    Route::patch('/image/update/{id}', [ImageController::class, 'update'])->name('updateImage'); 
});

// favorites http requests
Route::get('/image/favorite/trending', [FavoriteController::class, 'trendingImages']); 
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/image/favorite/add/{id}', [FavoriteController::class, 'add']); 
    Route::delete('/image/favorite/delete/{id}', [FavoriteController::class, 'delete']); 
});
