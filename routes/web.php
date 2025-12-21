<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [BookController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::resource('books', BookController::class)
    ->middleware('auth');

require __DIR__ . '/auth.php';
