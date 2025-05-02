<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\BookController;
use App\Http\Controllers\V1\GenreController;
use App\Http\Controllers\V1\AuthorController;
use App\Http\Controllers\V1\CountryController;
use App\Http\Controllers\V1\PublisherController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API v1 routes 
Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('books', BookController::class);
    Route::apiResource('countries', CountryController::class);
    Route::apiResource('genres', GenreController::class);
    Route::apiResource('publishers', PublisherController::class);
    Route::apiResource('authors', AuthorController::class);
});

