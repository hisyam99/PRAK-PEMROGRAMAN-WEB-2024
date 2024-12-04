<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
    Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

require __DIR__ . '/auth.php';
