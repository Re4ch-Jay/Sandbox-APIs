<?php

use App\Http\Controllers\API\v1\Auth\RegisterController;
use App\Http\Controllers\API\v1\CategoryController;
use App\Http\Controllers\API\v1\CommentController;
use App\Http\Controllers\API\v1\LikeController;
use App\Http\Controllers\API\v1\PostController;
use App\Http\Controllers\API\v1\ShareController;
use App\Http\Controllers\API\v1\UserController;
use App\Http\Controllers\API\v1\Auth\AuthenticateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {

    /**
     * Unauthenticated User Route
     */
    Route::prefix('auth')->group(function () {
        Route::post('/register', [RegisterController::class, 'store'])->name('auth.register');
        Route::post('/login', [AuthenticateController::class, 'store'])->name('auth.login');
    });

    /**
     * Authenticated User Route
     */
    Route::middleware(['auth:sanctum'])->group(function () {

        Route::post('auth/logout', [AuthenticateController::class, 'destroy'])->name('auth.logout');
        
        Route::apiResource('posts', PostController::class); 
        Route::prefix('post')->group(function () {
            Route::apiResource('shares', ShareController::class)->except('show'); 
        });
        Route::apiResource('categories', CategoryController::class); 
        Route::apiResource('comments', CommentController::class); 
        Route::apiResource('likes', LikeController::class)->only('index','store', 'destroy'); 
        Route::apiResource('users', UserController::class)->only('index', 'show'); 
        Route::prefix('users')->group(function () {
            Route::get('{user}/posts', [UserController::class, 'posts']);
            Route::get('{user}/shares', [UserController::class, 'shares']);
            Route::get('{user}/likes', [UserController::class, 'likes']);
            Route::get('{user}/comments', [UserController::class, 'comments']);
        });
    });
 
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
