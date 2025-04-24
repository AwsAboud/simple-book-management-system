<?php

use App\Http\Controllers\v1\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API v1 routes 
Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('books', BookController::class);
});

