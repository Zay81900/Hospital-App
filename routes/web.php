<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/login', [AuthController::class,'login'])->name('auth.login');


Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');
Route::get('/blog-detail', [UserController::class, 'blog_detail'])->name('user.blog_detail');
