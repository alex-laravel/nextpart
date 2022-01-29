<?php

use App\Http\Controllers\Backend\TecDoc\DirectArticle\DirectArticleAjaxController;
use App\Http\Controllers\Backend\TecDoc\DirectArticle\DirectArticleController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.direct-articles'.
 */
Route::group(['prefix' => 'direct-articles'], function () {
    Route::post('get', [DirectArticleAjaxController::class, 'get'])->name('ajax.direct-articles.get');
});

Route::resource('direct-articles', DirectArticleController::class)->only('index');

