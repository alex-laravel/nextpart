<?php


namespace App\Http\Controllers\Backend\TecDoc\Model\Traits;


use App\Models\TecDoc\Vehicle\Vehicle;
use App\Models\TecDoc\VehicleDetails\VehicleDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait ModelVehiclesAssetsSynchronize
{
    /**
     * @param integer $modelId
     * @return RedirectResponse
     */
    public function syncVehicleAssets($modelId)
    {
        ini_set('max_execution_time', 0);

        $modelId = (int)$modelId;

        $vehicleIds = Vehicle::where('modelId', $modelId)->orderBy('id')->get()->pluck('carId')->toArray();

        $vehiclesDetails = VehicleDetails::whereIn('carId', $vehicleIds)->whereNotNull('vehicleDocId')->get();

        foreach ($vehiclesDetails as $vehicleDetails) {
            Artisan::call('tecdoc:vehicle-assets', [
                'vehicleId' => $vehicleDetails->carId,
                'vehicleDocId' => $vehicleDetails->vehicleDocId
            ]);

            $output = Artisan::output();

            if (!$output) {
                \Log::alert('FAIL VEHICLE ASSETS RESPONSE for Vehicle ID [' . $vehicleDetails->carId . ']!');
                continue;
            }

            \Log::info('ASSETS CREATED for VEHICLE ID [' . $vehicleDetails->carId . ']!');
        }

        return redirect()->back();
    }
}
