<?php

use App\Http\Controllers\Backend\TecDoc\AssemblyGroup\AssemblyGroupAjaxController;
use App\Http\Controllers\Backend\TecDoc\AssemblyGroup\AssemblyGroupController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.assembly-groups'.
 */
Route::group(['prefix' => 'assembly-groups'], function () {
    Route::post('get', [AssemblyGroupAjaxController::class, 'get'])->name('ajax.assembly-groups.get');
    Route::post('sync', [AssemblyGroupController::class, 'sync'])->name('assembly-groups.sync');
});

Route::resource('assembly-groups', AssemblyGroupController::class)->only('index');
