<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Frontend Routes
Route::get('/',[PageController::class,'home'])->name('home');




//Admin Dashboard Routes
Route::middleware('auth')->group(function () {


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/admin/company', CompanyController::class)->names('company');

    Route::resource('/admin/category', CategoryController::class)->names('category');
    Route::resource('/admin/advertise', AdvertiseController::class)->names('advertise');
    Route::resource('/admin/post', PostController::class)->names('post');

});




require __DIR__.'/auth.php';
