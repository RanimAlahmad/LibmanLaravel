<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Book\AuthorController;



Route::resource('author', AuthorController::class);
Route::post('updateAuthour/{id?}',[AuthorController::class, 'updateA']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
