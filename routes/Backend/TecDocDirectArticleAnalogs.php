<?php

use App\Http\Controllers\Backend\TecDoc\DirectArticleAnalogs\DirectArticleAnalogsAjaxController;
use App\Http\Controllers\Backend\TecDoc\DirectArticleAnalogs\DirectArticleAnalogsController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.direct-article-analogs'.
 */
Route::group(['prefix' => 'direct-article-analogs'], function () {
    Route::post('get', [DirectArticleAnalogsAjaxController::class, 'get'])->name('ajax.direct-article-analogs.get');
});
Route::resource('direct-article-analogs', DirectArticleAnalogsController::class)->only('index');
