<?php

use App\Http\Controllers\Backend\TecDoc\GenericArticle\GenericArticleAjaxController;
use App\Http\Controllers\Backend\TecDoc\GenericArticle\GenericArticleController;
use Illuminate\Support\Facades\Route;

/**
 * All route names are prefixed with 'backend.generic-articles'.
 */
Route::group(['prefix' => ''], function () {
    Route::post('generic-articles/get', [GenericArticleAjaxController::class, 'get'])->name('ajax.generic-articles.get');

    Route::post('generic-articles/sync', [GenericArticleController::class, 'sync'])->name('generic-articles.sync');
    Route::resource('generic-articles', GenericArticleController::class);
});
