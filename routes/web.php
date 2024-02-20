<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Staff\CartController;
use App\Http\Controllers\Staff\ProductController as StaffProductController;
use App\Http\Controllers\Staff\TransactionController as StaffTransactionController;
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
Route::post('/login', [AuthController::class, 'login'])->name('login.user');

Route::middleware('admin')->group(function () {
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

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
});


Route::get('/carts', [CartController::class, 'index'])->name('carts');
Route::post('/carts', [CartController::class, 'store'])->name('add.carts');
Route::get('/carts/delete/{id}', [CartController::class, 'destroy'])->name('delete.carts');
Route::get('/list-product', [StaffProductController::class, 'index'])->name('list.products');
Route::get('/histories', [StaffTransactionController::class, 'index']);
