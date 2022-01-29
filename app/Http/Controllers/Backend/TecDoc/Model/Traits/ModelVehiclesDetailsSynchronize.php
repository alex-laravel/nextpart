<?php


namespace App\Http\Controllers\Backend\TecDoc\Model\Traits;


use App\Models\TecDoc\Vehicle\Vehicle;
use App\Models\TecDoc\VehicleDetails\VehicleDetails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait ModelVehiclesDetailsSynchronize
{
    /**
     * @param integer $modelId
     * @return RedirectResponse
     */
    public function syncVehicleDetails($modelId)
    {
        ini_set('max_execution_time', 0);

        $modelId = (int)$modelId;

        $vehicleIds = Vehicle::where('modelId', $modelId)->orderBy('id')->get()->pluck('carId')->toArray();

        foreach (array_chunk($vehicleIds, 250) as $vehicleIdsChunk) {
            VehicleDetails::whereIn('carId', $vehicleIdsChunk)->delete();
        }

        foreach (array_chunk($vehicleIds, 24) as $vehicleIdsChunk) {
            Artisan::call('tecdoc:vehicle-details', [
                'vehicleIds' => $vehicleIdsChunk
            ]);

            $output = Artisan::output();
            $output = json_decode($output, true);

            if (!$this->hasSuccessResponse($output)) {
                \Log::alert('FAIL RESPONSE FOR CAR CHUNK [' . implode(",", $vehicleIdsChunk) . ']!');
                continue;
            }

            $output = $this->getResponseDataAsArray($output);

            if (empty($output)) {
                \Log::alert('EMPTY RESPONSE FOR CAR CHUNK [' . implode(",", $vehicleIdsChunk) . ']!');
                continue;
            }

            foreach ($output as &$vehicle) {
                if (!isset($vehicle['vehicleDetails'])) {
                    \Log::alert('INVALID FORMAT RESPONSE FOR CAR CHUNK [' . implode(",", $vehicleIdsChunk) . '] AND CAR ID [' . 1 . ']!');
                    continue;
                }

                $vehicle['vehicleDetails']['vehicleDocId'] = isset($vehicle['vehicleDocId']) ? $vehicle['vehicleDocId'] : null;

                unset($vehicle['vehicleDetails']['rmiTypeId']);

                VehicleDetails::create($vehicle['vehicleDetails']);
            }

            \Log::info('VEHICLE DETAILS FOR IDS [' . implode(",", $vehicleIdsChunk) . '] CREATED!');
        }

        return redirect()->back();
    }
}
