<?php

use App\Http\Controllers\Backend\TecDoc\Manufacturer\ManufacturerAjaxController;
use App\Http\Controllers\Backend\TecDoc\Manufacturer\ManufacturerController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.manufacturers'.
 */
Route::group(['prefix' => 'manufacturers'], function () {
    Route::post('get', [ManufacturerAjaxController::class, 'get'])->name('ajax.manufacturers.get');
    Route::post('sync', [ManufacturerController::class, 'sync'])->name('manufacturers.sync');
    Route::post('{manufacturerId}/models/sync', [ManufacturerController::class, 'syncModels'])->name('manufacturers.models.sync');
});

Route::resource('manufacturers', ManufacturerController::class)->only('index');
