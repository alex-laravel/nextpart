<?php

use App\Http\Controllers\Locale\LocaleController;
use Illuminate\Support\Facades\Route;

/**
 * Locale Controllers
 */

Route::get('/locale/{locale}', [LocaleController::class, 'swap'])->name('swap');
