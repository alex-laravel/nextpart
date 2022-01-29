<?php

use App\Http\Controllers\Api\TecDoc\Model\ApiModelController;
use Illuminate\Support\Facades\Route;

/**
 * API Models Controllers
 */

Route::get('/models/{manufacturerId}', [ApiModelController::class, 'index'])->name('models.index');
