<?php

use App\Http\Controllers\Backend\Shop\Order\OrderController;
use App\Http\Controllers\Backend\Shop\Order\OrderAjaxController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.orders'.
 */
Route::group(['prefix' => 'orders'], function () {
    Route::post('get', [OrderAjaxController::class, 'get'])->name('ajax.orders.get');

});

Route::resource('orders', OrderController::class);
