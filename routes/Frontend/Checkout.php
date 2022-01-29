<?php

use App\Http\Controllers\Frontend\Checkout\CheckoutController;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Cart Controllers
 */

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.index');
