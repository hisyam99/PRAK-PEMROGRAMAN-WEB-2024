<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

//users
Route::apiResource('/users', App\Http\Controllers\Api\UserController::class);

//services
Route::apiResource('/services', App\Http\Controllers\Api\ServiceController::class);

//ratings
Route::apiResource('/ratings', App\Http\Controllers\Api\RatingController::class);

//reviews
Route::apiResource('/reviews', App\Http\Controllers\Api\ReviewController::class);
