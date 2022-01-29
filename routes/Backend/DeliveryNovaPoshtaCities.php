<?php

use App\Http\Controllers\Backend\Delivery\NovaPoshtaCity\NovaPoshtaCityAjaxController;
use App\Http\Controllers\Backend\Delivery\NovaPoshtaCity\NovaPoshtaCityController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.delivery.nova-poshta.cities'.
 */
Route::prefix('delivery/nova-poshta')->name('delivery.nova-poshta.')->group(function () {
    Route::post('cities/get', [NovaPoshtaCityAjaxController::class, 'get'])->name('ajax.cities.get');

    Route::post('cities/sync', [NovaPoshtaCityController::class, 'sync'])->name('cities.sync');
    Route::resource('cities', NovaPoshtaCityController::class)->only(['index']);
});
