<?php

use App\Http\Controllers\Frontend\Page\PageController;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Page Controllers
 */

Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('pages.contacts');
Route::get('/payment', [PageController::class, 'payment'])->name('pages.payment');
Route::get('/delivery', [PageController::class, 'delivery'])->name('pages.delivery');
Route::get('/privacy', [PageController::class, 'privacy'])->name('pages.privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('pages.terms');
Route::get('/faq', [PageController::class, 'faq'])->name('pages.faq');
