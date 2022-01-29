<?php

use App\Http\Controllers\Backend\Delivery\NovaPoshtaWarehouse\NovaPoshtaWarehouseAjaxController;
use App\Http\Controllers\Backend\Delivery\NovaPoshtaWarehouse\NovaPoshtaWarehouseController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.delivery.nova-poshta.warehouses'.
 */
Route::prefix('delivery/nova-poshta')->name('delivery.nova-poshta.')->group(function () {
    Route::post('warehouses/get', [NovaPoshtaWarehouseAjaxController::class, 'get'])->name('ajax.warehouses.get');

    Route::post('warehouses/sync', [NovaPoshtaWarehouseController::class, 'sync'])->name('warehouses.sync');
    Route::resource('warehouses', NovaPoshtaWarehouseController::class)->only(['index']);
});
