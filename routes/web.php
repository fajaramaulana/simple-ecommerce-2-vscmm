<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomePageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomePageController::class, 'index'])->name('welcomepage.index');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticateController::class, 'login'])
        ->name('login');

    Route::post('login', [AuthenticateController::class, 'loginPost']);


    Route::get('register', [AuthenticateController::class, 'register'])
        ->name('register');

    Route::post('register', [AuthenticateController::class, 'registerPost']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [DashboardController::class, 'users'])->name('admin.users');
    Route::get('/admin/products', [DashboardController::class, 'products'])->name('admin.products');
});
