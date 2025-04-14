<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
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
Route::get('/appointment', [AppointmentController::class, 'appointment'])->name('user.appointment');
Route::post('/appointment/book', [AppointmentController::class, 'appointmentStore'])->name('user.appointment.store');

Route::get('/user/profile/{id}/edit', [UserController::class, 'edit'])->name('user.profile_edit');
Route::put('/user/profile/{id}', [UserController::class, 'profile_update'])->name('user.profile_update');


Route::get('/login', [AuthController::class,'login'])->name('auth.login');
Route::get('/register', [AuthController::class,'register'])->name('auth.register');
Route::post('/LoginUser', [AuthController::class, 'LoginUser'])->name('auth.loginUser');
Route::post('/RegisterUser', [AuthController::class, 'RegisterUser'])->name('auth.registerUser');
Route::post('/logout', [AuthController::class, 'LogoutUser'])->name('auth.logoutUser');


Route::get('/doctors', [DoctorController::class,'index'])->name('user.doctors');
Route::get('/doctorslist', [DoctorController::class,'listDoctors'])->name('doctors.list');



// //  Admin
Route::prefix('/admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/lists', [AdminController::class, 'lists'])->name('admin.lists');
    Route::get('/userlist', [AdminController::class, 'UserList'])->name('admin.users_list');
    Route::get('/doctorlist', [AdminController::class, 'DoctorList'])->name('admin.doctors_list');
});