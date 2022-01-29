<?php

use App\Http\Controllers\Backend\TecDoc\Country\CountryAjaxController;
use App\Http\Controllers\Backend\TecDoc\Country\CountryController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.countries'.
 */
Route::group(['prefix' => ''], function () {
    Route::post('countries/get', [CountryAjaxController::class, 'get'])->name('ajax.countries.get');

    Route::post('countries/sync', [CountryController::class, 'sync'])->name('countries.sync');
    Route::resource('countries', CountryController::class);
});
