<?php

use App\Http\Controllers\Backend\TecDoc\CountryGroup\CountryGroupAjaxController;
use App\Http\Controllers\Backend\TecDoc\CountryGroup\CountryGroupController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.country-groups'.
 */
Route::group(['prefix' => ''], function () {
    Route::post('country-groups/get', [CountryGroupAjaxController::class, 'get'])->name('ajax.country-groups.get');

    Route::post('country-groups/sync', [CountryGroupController::class, 'sync'])->name('country-groups.sync');
    Route::resource('country-groups', CountryGroupController::class);
});
