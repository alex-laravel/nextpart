<?php

use App\Http\Controllers\Backend\TecDoc\DirectArticleDetails\DirectArticleDetailsAjaxController;
use App\Http\Controllers\Backend\TecDoc\DirectArticleDetails\DirectArticleDetailsController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.direct-article-details'.
 */
Route::group(['prefix' => 'direct-article-details'], function () {
    Route::post('get', [DirectArticleDetailsAjaxController::class, 'get'])->name('ajax.direct-article-details.get');
});

Route::resource('direct-article-details', DirectArticleDetailsController::class)->only('index');
