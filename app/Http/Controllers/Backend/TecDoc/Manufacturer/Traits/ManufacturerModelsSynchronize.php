<?php


namespace App\Http\Controllers\Backend\TecDoc\Manufacturer\Traits;


use App\Models\TecDoc\Manufacturer\Manufacturer;
use App\Models\TecDoc\ModelSeries\ModelSeries;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

trait ManufacturerModelsSynchronize
{
    /**
     * @param integer $manufacturerId
     * @return RedirectResponse
     */
    public function syncModels($manufacturerId)
    {
        ini_set('max_execution_time', 0);

        $manufacturerId = (int)$manufacturerId;

        Manufacturer::where('manuId', $manufacturerId)->update(['modelsTotal' => 0]);
        ModelSeries::where('manuId', $manufacturerId)->delete();

        foreach (self::$allowedPassengerAndCommercialLinkingTargetTypes as $linkingTargetType) {
            Artisan::call('tecdoc:models', [
                'country' => config('tecdoc.api.country'),
                'countryGroup' => null,
                'manufacturerId' => $manufacturerId,
                'linkingTargetType' => $linkingTargetType
            ]);

            $output = Artisan::output();
            $output = json_decode($output, true);

            if (!$this->hasSuccessResponse($output)) {
                continue;
            }

            $output = $this->getResponseDataAsArray($output);

            if (empty($output)) {
                continue;
            }

            foreach ($output as $index => &$model) {
                $model['manuId'] = $manufacturerId;
                $model['yearOfConstrFrom'] = isset($model['yearOfConstrFrom']) ? $this->prepareConstructionYearFormat($model['yearOfConstrFrom']) : null;
                $model['yearOfConstrTo'] = isset($model['yearOfConstrTo']) ? $this->prepareConstructionYearFormat($model['yearOfConstrTo']) : null;
                $model['isPopular'] = $model['favorFlag'];
                $model['isVisible'] = $model['favorFlag'];
                $model['slug'] = Str::slug($model['modelname']);
            }

            ModelSeries::insert($output);
        }

        Manufacturer::where('manuId', $manufacturerId)->update(['modelsTotal' => ModelSeries::where('manuId', $manufacturerId)->count()]);

        return redirect()->back();
    }

    /**
     * @param string $year
     * @return integer|null
     */
    private function prepareConstructionYearFormat($year)
    {
        if (empty($year)) {
            return null;
        }

        $yearFrom = 1900;
        $yearTo = date('Y');

        $year = substr($year, 0, 4);
        $year = (int)$year;

        return ($yearFrom <= $year) && ($year <= $yearTo) ? $year : null;
    }
}
