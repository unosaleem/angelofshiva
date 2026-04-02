<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::get('/reset-password/{token}', function ($token, Request $request) {
    return view('user.auth.reset-password', [
        'token' => $token,
        'email' => $request->email
    ]);
})->name('password.reset');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog.index');
Route::get('/blog/{id}', [HomeController::class, 'blogDetails'])->name('blog.show');
Route::get('/audio/{slug}', [HomeController::class, 'audioMenuCategory'])->name('audio.menu');
Route::get('/category/{slug}', [HomeController::class, 'categorywiseData'])->name('category.data');
Route::post('/blog/comment/{id}', [BlogController::class, 'storeComment'])->name('blog.comment');
Route::post('/newsletter', [HomeController::class, 'newsletter'])->name('newsletter.subscribe');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [UserController::class, 'profile'])
        ->name('profile');

    Route::get('/favorites', [UserController::class, 'favorites'])
        ->name('favorites');

});
