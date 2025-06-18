<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/liked-destinations', [DestinationController::class, 'liked'])->name('destinations.liked');
    Route::get('/disliked', [DestinationController::class, 'disliked'])->name('destinations.disliked');

    Route::middleware(['auth'])->group(function () {
        Route::get('/my-destinations', [DestinationController::class, 'mine'])->name('destinations.mine');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Comment out to avoid errors
    // Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

    // Routes for destinations
    Route::get('/destinations/create', [DestinationController::class, 'create'])->name('destinations.create');
    Route::post('/destinations', [DestinationController::class, 'store'])->name('destinations.store');
    Route::get('/destinations/{id}/edit', [DestinationController::class, 'edit'])->name('destinations.edit');
    Route::patch('/destinations/{id}', [DestinationController::class, 'update'])->name('destinations.update');
    Route::delete('/destinations/{id}', [DestinationController::class, 'destroy'])->name('destinations.destroy');
    Route::post('/destinations/{id}/like', [DestinationController::class, 'like'])->name('destinations.like');
    Route::post('/destinations/{id}/dislike', [DestinationController::class, 'dislike'])->name('destinations.dislike');
});

Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{id}', [DestinationController::class, 'show'])->name('destinations.show');

require __DIR__.'/auth.php';