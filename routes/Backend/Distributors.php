<?php

use App\Http\Controllers\Backend\Distributor\DistributorController;
use App\Http\Controllers\Backend\Distributor\DistributorAjaxController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.distributors'.
 */
Route::group(['prefix' => ''], function () {
    Route::post('distributors/get', [DistributorAjaxController::class, 'get'])->name('ajax.distributors.get');
    Route::resource('distributors', DistributorController::class);
});
