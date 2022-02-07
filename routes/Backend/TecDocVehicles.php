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

    Route::post('{vehicleId}/direct-articles/sync', [VehicleController::class, 'syncDirectArticles'])->name('vehicles.direct-articles.sync');
//    Route::post('{manufacturerId}/direct-article-details/sync', [ManufacturerController::class, 'syncDirectArticleDetails'])->name('vehicles.direct-article-details.sync');
//    Route::post('{manufacturerId}/direct-article-assets/sync', [ManufacturerController::class, 'syncDirectArticleAssets'])->name('vehicles.direct-article-assets.sync');
//    Route::post('{manufacturerId}/direct-article-analogs/sync', [ManufacturerController::class, 'syncDirectArticleAnalogs'])->name('vehicles.direct-article-analogs.sync');
});

Route::resource('vehicles', VehicleController::class)->only(['index', 'show']);
