<?php

use App\Http\Controllers\Backend\TecDoc\Vehicle\VehicleAjaxController;
use App\Http\Controllers\Backend\TecDoc\Vehicle\VehicleController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.vehicles'.
 */
Route::group(['prefix' => 'vehicles'], function () {
    Route::post('get', [VehicleAjaxController::class, 'get'])->name('ajax.vehicles.get');
    Route::post('sync', [VehicleController::class, 'sync'])->name('vehicles.sync');
});

Route::resource('vehicles', VehicleController::class)->only(['index', 'show']);
