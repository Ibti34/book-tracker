<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookApiController;

// Public route (login)
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {

    // Book APIs
    Route::get('/books', [BookApiController::class, 'index']);
    Route::post('/books', [BookApiController::class, 'store']);
    Route::put('/books/{id}', [BookApiController::class, 'update']);
    Route::delete('/books/{id}', [BookApiController::class, 'destroy']);

    // Optional: test auth
    Route::get('/me', function (Request $request) {
        return $request->user();
    });
});
