<?php

use App\Http\Controllers\Frontend\Account\AccountController;
use App\Http\Controllers\Frontend\Account\PasswordController;
use App\Http\Controllers\Frontend\Account\ProfileController;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Account Controllers
 */

Route::name('account.')->prefix('account')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AccountController::class, 'dashboard'])->name('dashboard');
    Route::get('/garage', [AccountController::class, 'garage'])->name('garage');
    Route::get('/orders', [AccountController::class, 'orders'])->name('orders');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile');
    Route::get('/password', [PasswordController::class, 'index'])->name('password');
    Route::patch('/password', [PasswordController::class, 'update'])->name('password');
});
