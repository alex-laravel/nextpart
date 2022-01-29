<?php

use App\Http\Controllers\Backend\TecDoc\Brand\BrandAjaxController;
use App\Http\Controllers\Backend\TecDoc\Brand\BrandController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.brands'.
 */
Route::group(['prefix' => 'brands'], function () {
    Route::post('get', [BrandAjaxController::class, 'get'])->name('ajax.brands.get');
    Route::post('sync', [BrandController::class, 'sync'])->name('brands.sync');
    Route::post('sync-assets', [BrandController::class, 'syncAssets'])->name('brands.sync-assets');
    Route::post('sync-addresses', [BrandController::class, 'syncAssets'])->name('brands.sync-addresses');
});

Route::resource('brands', BrandController::class)->only(['index', 'show']);
