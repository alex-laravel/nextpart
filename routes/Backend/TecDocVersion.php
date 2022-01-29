<?php

use App\Http\Controllers\Backend\TecDoc\Version\VersionAjaxController;
use App\Http\Controllers\Backend\TecDoc\Version\VersionController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.version'.
 */
Route::group(['prefix' => ''], function () {
    Route::post('version/get', [VersionAjaxController::class, 'get'])->name('ajax.version.get');

    Route::post('version/sync', [VersionController::class, 'sync'])->name('version.sync');
    Route::resource('version', VersionController::class);
});
