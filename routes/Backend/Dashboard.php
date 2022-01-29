<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

/**
 * Backend Controllers
 */

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
