<?php

namespace App\Http\Controllers\Auto;

use App\Facades\Garage;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;


class GarageController extends Controller
{
    /**
     * @param integer $manufacturerId
     * @param integer $modelSeriesId
     * @param integer $vehicleId
     * @return RedirectResponse
     */
    public function vehicleActivate($manufacturerId, $modelSeriesId, $vehicleId)
    {
        Garage::activateVehicle($manufacturerId, $modelSeriesId, $vehicleId);

        return back();
    }

    /**
     * @param integer $manufacturerId
     * @param integer $modelSeriesId
     * @param integer $vehicleId
     * @return RedirectResponse
     */
    public function vehicleDelete($manufacturerId, $modelSeriesId, $vehicleId)
    {
        Garage::deleteVehicle($manufacturerId, $modelSeriesId, $vehicleId);

        return back();
    }
}
