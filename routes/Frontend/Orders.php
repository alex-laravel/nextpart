<?php

use App\Http\Controllers\Frontend\Order\OrderController;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Order Controllers
 */
//Route::group(['prefix' => ''], function () {
    Route::resource('orders', OrderController::class)->only(['store']);
//});
