<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/contact', [UserController::class, 'contact'])->name('user.contact');
Route::get('/blog-detail', [UserController::class, 'blog_detail'])->name('user.blog_detail');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
Route::put('/profile/edit/{id}', [UserController::class, 'ProfileUpdate'])->name('user.profile_update');


Route::get('/login', [AuthController::class,'login'])->name('auth.login');
Route::get('/register', [AuthController::class,'register'])->name('auth.register');
Route::post('/LoginUser', [AuthController::class, 'LoginUser'])->name('auth.loginUser');
Route::post('/RegisterUser', [AuthController::class, 'RegisterUser'])->name('auth.registerUser');
Route::post('/logout', [AuthController::class, 'LogoutUser'])->name('auth.logoutUser');


Route::get('/doctors', [DoctorController::class,'index'])->name('user.doctors');
Route::get('/doctorslist', [DoctorController::class,'listDoctors'])->name('doctors.list');
