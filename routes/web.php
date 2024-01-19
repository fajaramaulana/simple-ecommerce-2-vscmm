<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
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
    Route::post('/admin/users', [DashboardController::class, 'userCreatePost'])->name('admin.users.create');
    Route::put('/admin/users/{id}', [DashboardController::class, 'usersUpdate'])->name('admin.users.update');

    Route::get('/admin/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::post('/admin/products', [ProductsController::class, 'productCreatePost'])->name('admin.product.create');
    Route::put('/admin/products/{id}', [ProductsController::class, 'updateProduct'])->name('admin.product.update');
});
