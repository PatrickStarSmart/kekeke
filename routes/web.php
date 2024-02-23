<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Staff\CartController;
use App\Http\Controllers\Staff\ProductController as StaffProductController;
use App\Http\Controllers\Staff\TransactionController as StaffTransactionController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Staff;
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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('', [AuthController::class, 'login'])->name('login.user');

Route::middleware(['auth:sanctum', Admin::class])->group(function () {
    Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
        Route::get('', 'index')->name('dashboard');
    });

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('/create', 'create')->name('add.products');
        Route::post('', 'store')->name('store.products');
        Route::get('/{id}', 'edit')->name('edit.products');
        Route::put('/{id}', 'update')->name('update.products');
        Route::get('/delete/{id}', 'destroy')->name('delete.products');
    });

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->name('users');
        Route::get('/create', 'create')->name('add.users');
        Route::post('', 'store')->name('store.users');
        Route::get('/{id}', 'edit')->name('edit.users');
        Route::put('/{id}', 'update')->name('update.users');
        Route::get('/delete/{id}', 'destroy')->name('delete.users');
    });

    Route::controller(TransactionController::class)->prefix('transactions')->group(function () {
        Route::get('', 'index')->name('transactions');
        Route::get('/export', 'export')->name('export');
        Route::get('/{id}', 'show')->name('show.transactions');
    });

    Route::get('/admin-logout', [AuthController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['auth:sanctum', Staff::class])->group(function () {
    Route::get('/list-product', [StaffProductController::class, 'index'])->name('list.products');

    Route::controller(CartController::class)->prefix('carts')->group(function () {
        Route::get('', 'index')->name('carts');
        Route::post('', 'store')->name('add.carts');
        Route::put('/{id}', 'update')->name('update.carts');
        Route::get('delete/{id}', 'destroy')->name('delete.carts');
    });

    Route::controller(StaffTransactionController::class)->prefix('histories')->group(function () {
        Route::get('', 'index')->name('histories');
        Route::get('/{id}', 'show')->name('detail.transactions');
        Route::post('', 'checkout')->name('checkout');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('staff.logout');
});
