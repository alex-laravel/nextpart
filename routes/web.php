<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Auth Routes
 */
Auth::routes();

//Route::group(['as' => 'auth.'], function () {
//    includeRouteFiles(__DIR__.'/Auth/');
//});

/*
 * Locale Routes
 */
Route::name('locale.')->group(function () {
    includeRouteFiles(__DIR__ . '/Locale/');
});

/*
 * Backend Routes
 */
Route::name('backend.')->prefix('admin')->middleware(['auth'])->group(function () {
    includeRouteFiles(__DIR__ . '/Backend/');
});

/*
 * Frontend Routes
 */
Route::name('frontend.')->group(function () {
    includeRouteFiles(__DIR__ . '/Frontend/');
});
