<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    // Admin Routes
    Route::middleware('admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user.index');

            // API AJAX
            Route::prefix('ajax')->group(function () {
                Route::any('/users', [App\Http\Controllers\UserController::class, 'ajax'])->name('user.ajax');
            });
        });
    });

    // User Routes
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    // Post Routes
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::put('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

    Route::prefix('ajax')->group(function () {
        Route::any('/posts', [App\Http\Controllers\PostController::class, 'ajax'])->name('post.ajax');
    });
});