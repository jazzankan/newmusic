<?php

use App\Http\Controllers\ArtistsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeyController;

#Route::view('/', 'welcome');

Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/keycall', [KeyController::class, 'index'])
    ->middleware(['auth']);

Route::view('/search', 'search')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('artists', ArtistsController::class)
    ->middleware(['auth']);


require __DIR__.'/auth.php';
