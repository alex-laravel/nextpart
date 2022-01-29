<?php


namespace App\Http\Controllers\Backend\TecDoc\Model\Traits;


use App\Models\TecDoc\Manufacturer\Manufacturer;
use App\Models\TecDoc\ModelSeries\ModelSeries;
use App\Models\TecDoc\Vehicle\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

trait ModelVehiclesSynchronize
{
    /**
     * @param integer $modelId
     * @return RedirectResponse
     */
    public function syncVehicles($modelId)
    {
        ini_set('max_execution_time', 0);

        $modelId = (int)$modelId;

        $modelSeries = ModelSeries::where('modelId', $modelId)->first();

        Vehicle::where('modelId', $modelSeries->modelId)->delete();
        Manufacturer::where('manuId', $modelSeries->manuId)->update(['vehiclesTotal' => 0]);
        ModelSeries::where('modelId', $modelSeries->modelId)->update(['vehiclesTotal' => 0]);

        foreach (self::$allowedPassengerAndCommercialLinkingTargetTypes as $linkingTargetType) {
            Artisan::call('tecdoc:vehicles', [
                'country' => config('tecdoc.api.country'),
                'countryGroup' => null,
                'manufacturerId' => $modelSeries->manuId,
                'modelId' => $modelSeries->modelId,
                'linkingTargetType' => $linkingTargetType,
            ]);

            $output = Artisan::output();
            $output = json_decode($output, true);

            if (!$this->hasSuccessResponse($output)) {
                \Log::alert('FAIL RESPONSE FOR MANUFACTURER ID [' . $modelSeries->manuId . '] AND MODEL ID [' . $modelSeries->modelId . ']!');
                continue;
            }

            $output = $this->getResponseDataAsArray($output);

            if (empty($output)) {
                \Log::alert('EMPTY RESPONSE FOR MANUFACTURER ID [' . $modelSeries->manuId . '] AND MODEL ID [' . $modelSeries->modelId . ']!');
                continue;
            }

            foreach ($output as $index => &$vehicle) {
                $vehicle['manuId'] = $modelSeries->manuId;
                $vehicle['modelId'] = $modelSeries->modelId;
                $vehicle['slug'] = Str::slug($vehicle['carName']);
            }

            Vehicle::insert($output);

            \Log::info('VEHICLES FOR MANUFACTURER ID [' . $modelSeries->manuId . '] AND MODEL ID [' . $modelSeries->modelId . '] CREATED!');
        }

        Manufacturer::where('manuId', $modelSeries->manuId)->update(['vehiclesTotal' => Vehicle::where('manuId', $modelSeries->manuId)->count()]);
        ModelSeries::where('modelId', $modelSeries->modelId)->update(['vehiclesTotal' => Vehicle::where('modelId', $modelSeries->modelId)->count()]);

        return redirect()->back();
    }
}
