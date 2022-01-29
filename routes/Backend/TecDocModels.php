<?php

use App\Http\Controllers\Backend\TecDoc\Model\ModelAjaxController;
use App\Http\Controllers\Backend\TecDoc\Model\ModelController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.models'.
 */
Route::group(['prefix' => 'models'], function () {
    Route::post('get', [ModelAjaxController::class, 'get'])->name('ajax.models.get');
//    Route::post('sync', [ModelController::class, 'sync'])->name('models.sync');

    Route::post('{modelId}/vehicles/sync', [ModelController::class, 'syncVehicles'])->name('models.vehicles.sync');
    Route::post('{modelId}/vehicle-details/sync', [ModelController::class, 'syncVehicleDetails'])->name('models.vehicle-details.sync');
    Route::post('{modelId}/vehicle-assets/sync', [ModelController::class, 'syncVehicleAssets'])->name('models.vehicle-assets.sync');
});

Route::resource('models', ModelController::class)->only(['index']);
