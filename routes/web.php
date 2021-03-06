<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use Illuminate\Support\Facades\Route;

//home
Route::get('/',function(){
    return view('home');

})->name('home');

//register
Route::get('/register',[RegistrationController::class,'index'])->name('register');
Route::post('/register',[RegistrationController::class,'store']);

//login
Route::get('/login',[loginController::class,'index'])->name('login');
Route::post('/login',[loginController::class,'store']);

//logout
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

//dashboard
Route::get('/dashboard',[DashboardController::class,'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::post('/posts',[PostController::class,'store']);
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes',[PostLikeController::class,'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class,'destroy'])->name('posts.likes');