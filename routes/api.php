<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('company', [CompanyController::class, 'company']);

Route::get('categories', [PostController::class, 'categories']);
Route::get('latest-post', [PostController::class, 'latest_post']);
Route::get('trending-posts', [PostController::class, 'trending_posts']);
Route::get('category/{slug}', [PostController::class, 'category']);
Route::get('post/{id}', [PostController::class, 'post']);


// Auth Routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot-password', [AuthController::class, 'forgot_password']);


// LoggedIn User Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('company-store', [CompanyController::class, 'store']);
    Route::get('logout', [AuthController::class, 'logout']);
});
