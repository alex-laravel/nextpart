<?php

use App\Http\Controllers\Api\TecDoc\Vehicle\ApiVehicleController;
use Illuminate\Support\Facades\Route;

/**
 * API Vehicles Controllers
 */

Route::get('/vehicles/{modelId}', [ApiVehicleController::class, 'index'])->name('vehicles.index');
