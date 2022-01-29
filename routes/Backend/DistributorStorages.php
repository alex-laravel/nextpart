<?php

use App\Http\Controllers\Backend\DistributorStorage\DistributorStorageAjaxController;
use App\Http\Controllers\Backend\DistributorStorage\DistributorStorageController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.distributor-storages'.
 */
Route::group(['prefix' => ''], function () {
    Route::post('distributor-storages/get', [DistributorStorageAjaxController::class, 'get'])->name('ajax.distributor-storages.get');
    Route::resource('distributor-storages', DistributorStorageController::class);
});
