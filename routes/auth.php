<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\Auth\RegisterController;
use App\Http\Controllers\API\v1\Auth\AuthenticateController;

Route::prefix('auth')->group(function () {
    Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');
    Route::post('/login', [AuthenticateController::class, 'store'])->name('auth.login');
});

Route::post('auth/logout', [AuthenticateController::class, 'destroy'])
->name('auth.logout')
->middleware(['auth::sanctum']);
