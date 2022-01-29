<?php

use App\Http\Controllers\Api\Delivery\NovaPoshta\ApiNovaPoshtaRegionController;
use App\Http\Controllers\Api\Delivery\NovaPoshta\ApiNovaPoshtaCityController;
use App\Http\Controllers\Api\Delivery\NovaPoshta\ApiNovaPoshtaWarehouseController;
use Illuminate\Support\Facades\Route;

/**
 * API routes Nova Poshta
 */

Route::prefix('delivery/nova-poshta')->name('delivery.nova-poshta.')->group(function () {
    Route::get('regions', [ApiNovaPoshtaRegionController::class, 'index'])->name('regions.index');
    Route::get('cities/{area}', [ApiNovaPoshtaCityController::class, 'index'])->name('cities.index');
    Route::get('warehouses/{cityRef}', [ApiNovaPoshtaWarehouseController::class, 'index'])->name('warehouses.index');
});
