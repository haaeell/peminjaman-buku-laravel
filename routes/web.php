<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PengembalianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/', LandingPageController::class);
Route::resource('landingpage', LandingPageController::class);
Route::resource('riwayat', RiwayatController::class)->middleware('auth');
Route::resource('comments', CommentController::class)->middleware('auth');
Route::get('/search', [LandingPageController::class, 'search'])->name('book.search');
Route::post('/comments/{comment}/like-toggle', [CommentController::class, 'likeToggle'])->name('comments.like.toggle');





Route::middleware('auth', 'admin')->group(function () {
    
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('pengembalian', PengembalianController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/peminjaman/{id}/approve', [PeminjamanController::class, 'approvePeminjaman'])->name('peminjaman.approve');

});




Auth::routes();
