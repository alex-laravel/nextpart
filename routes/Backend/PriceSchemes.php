<?php

use App\Http\Controllers\Backend\PriceScheme\PriceSchemeAjaxController;
use App\Http\Controllers\Backend\PriceScheme\PriceSchemeController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.price-schemes'.
 */
Route::group(['prefix' => ''], function () {
    Route::post('price-schemes/get', [PriceSchemeAjaxController::class, 'get'])->name('ajax.price-schemes.get');
    Route::resource('price-schemes', PriceSchemeController::class);
});
