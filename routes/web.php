<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Frontend Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/category/{slug}', [PageController::class, 'category'])->name('cat');
Route::get('/news/{id}', [PageController::class, 'news'])->name('news');
Route::get('/search', [PageController::class, 'search'])->name('search');




//Admin Dashboard Routes
Route::middleware('auth')->group(function () {


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('/admin/category', CategoryController::class)->names('category');
    Route::resource('/admin/advertise', AdvertiseController::class)->names('advertise');
    Route::resource('/admin/post', PostController::class)->names('post');


    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::resource('/company', CompanyController::class)->names('company');
        Route::resource('/user', UserController::class)->names('user');
        Route::get('/export', [UserController::class, 'export'])->name('export');
    });
});




require __DIR__ . '/auth.php';
