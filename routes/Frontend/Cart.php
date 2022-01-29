<?php

use App\Http\Controllers\Frontend\Cart\CartController;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Cart Controllers
 */

Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::get('/cart/{productId}/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/{productId}/remove', [CartController::class, 'remove'])->name('cart.remove');

//Route::get('/cart/{productId}/update', [CartController::class, 'update'])->name('cart.update');
