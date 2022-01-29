<?php

use App\Http\Controllers\Backend\TecDoc\ShortCut\ShortCutAjaxController;
use App\Http\Controllers\Backend\TecDoc\ShortCut\ShortCutController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.short-cuts'.
 */
Route::group(['prefix' => 'short-cuts'], function () {
    Route::post('get', [ShortCutAjaxController::class, 'get'])->name('ajax.short-cuts.get');
    Route::post('sync', [ShortCutController::class, 'sync'])->name('short-cuts.sync');
});

Route::resource('short-cuts', ShortCutController::class)->only('index');
