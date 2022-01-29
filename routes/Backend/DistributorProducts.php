<?php

use App\Http\Controllers\Backend\DistributorProduct\DistributorProductController;
use App\Http\Controllers\Backend\DistributorProduct\DistributorProductAjaxController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.distributor-products'.
 */
Route::group(['prefix' => ''], function () {
    Route::post('distributor-products/get', [DistributorProductAjaxController::class, 'get'])->name('ajax.distributor-products.get');
    Route::post('distributor-products/import', [DistributorProductController::class, 'import'])->name('distributor-products.import');
    Route::post('distributor-products/sync', [DistributorProductController::class, 'sync'])->name('distributor-products.sync');
    Route::resource('distributor-products', DistributorProductController::class)->only(['index']);
});
