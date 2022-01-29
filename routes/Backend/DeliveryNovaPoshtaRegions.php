<?php

use App\Http\Controllers\Backend\Delivery\NovaPoshtaRegion\NovaPoshtaRegionAjaxController;
use App\Http\Controllers\Backend\Delivery\NovaPoshtaRegion\NovaPoshtaRegionController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.delivery.nova-poshta.regions'.
 */
Route::prefix('delivery/nova-poshta')->name('delivery.nova-poshta.')->group(function () {
    Route::post('regions/get', [NovaPoshtaRegionAjaxController::class, 'get'])->name('ajax.regions.get');

    Route::post('regions/sync', [NovaPoshtaRegionController::class, 'sync'])->name('regions.sync');
    Route::resource('regions', NovaPoshtaRegionController::class)->only(['index']);
});

