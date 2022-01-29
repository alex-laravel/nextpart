<?php

use App\Http\Controllers\Api\TecDoc\Manufacturer\ApiManufacturerController;
use Illuminate\Support\Facades\Route;

/**
 * API Manufacturer Controllers
 */

Route::get('/manufacturers', [ApiManufacturerController::class, 'index'])->name('manufacturers.index');
