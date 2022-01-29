<?php

use App\Http\Controllers\Backend\TecDoc\Language\LanguageAjaxController;
use App\Http\Controllers\Backend\TecDoc\Language\LanguageController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.languages'.
 */
Route::group(['prefix' => ''], function () {
    Route::post('languages/get', [LanguageAjaxController::class, 'get'])->name('ajax.languages.get');

    Route::post('languages/sync', [LanguageController::class, 'sync'])->name('languages.sync');
    Route::resource('languages', LanguageController::class);
});
