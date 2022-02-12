<?php

use App\Http\Controllers\User\ActivityController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\GoogleSocialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Book\AuthorController;
use App\Http\Controllers\Book\CategorieController;
use App\Http\Controllers\Book\BookController;

Route::resource('author', AuthorController::class);
Route::post('updateAuthour/{id?}', [AuthorController::class, 'updateA']);

Route::resource('categorie', CategorieController::class);
Route::post('updatecategorie/{id?}',[CategorieController::class, 'updateA']);


Route::resource('book', BookController::class);



Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'registerPhone']);
    Route::post('loginAdmin', [AuthController::class, 'loginAdmin']);

});

Route::prefix('user')->middleware('auth:api')->group(function () {
    Route::get('info', [AuthController::class, 'getInfo']);
    Route::put('update', [AuthController::class, 'updateProfile']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('favorite', [ActivityController::class, 'favorite']);
    Route::get('favorite/all', [ActivityController::class, 'getFavorite']);
    Route::get('orders', [ActivityController::class, 'getOrder']);
    Route::post('rate', [ActivityController::class, 'rate']);
    Route::post('order', [ActivityController::class, 'createOrder']);
    Route::get('all', [AuthController::class, 'getUsers'])->middleware('admin');

});
