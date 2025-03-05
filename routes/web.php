<?php
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

// Default Route - Show Register Page
Route::get('/', [RegisterController::class, 'show'])->name('register');

// Register Routes
Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit'); // Fixed POST route

// Login Routes
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout Route
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Protect task routes to allow only logged-in users
Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});