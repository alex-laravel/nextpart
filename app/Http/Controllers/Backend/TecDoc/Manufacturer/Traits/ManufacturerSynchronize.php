<?php

namespace App\Http\Controllers\Backend\TecDoc\Manufacturer\Traits;

use App\Http\Requests\Backend\Manufacturer\ManufacturerSynchronizeRequest;
use App\Models\TecDoc\Manufacturer\Manufacturer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

trait ManufacturerSynchronize
{
    /**
     * @param ManufacturerSynchronizeRequest $request
     * @return RedirectResponse
     */
    public function sync(ManufacturerSynchronizeRequest $request)
    {
        ini_set('max_execution_time', 0);

        Manufacturer::truncate();

        $manufacturerIds = [];

        foreach (self::$allowedPassengerAndCommercialLinkingTargetTypes as $linkingTargetType) {
            Artisan::call('tecdoc:manufacturers', [
                'country' => $request->input('country'),
                'countryGroup' => $request->input('countryGroup'),
                'linkingTargetType' => $linkingTargetType,
            ]);

            $output = Artisan::output();
            $output = json_decode($output, true);

            if (!$this->hasSuccessResponse($output)) {
                \Log::alert('Command [tecdoc:manufacturers] failed.');
                \Log::alert($output);
                continue;
            }

            $output = $this->getResponseDataAsArray($output);

            if (empty($output)) {
                \Log::alert('Command [tecdoc:manufacturers] has empty response for linkingTargetType [' . $linkingTargetType . '].');
                continue;
            }

            foreach ($output as $index => &$manufacturer) {
                if (in_array($manufacturer['manuId'], $manufacturerIds)) {
                    unset($output[$index]);
                    continue;
                }

                $manufacturer['isPopular'] = $manufacturer['favorFlag'];
                $manufacturer['isVisible'] = $manufacturer['favorFlag'];
                $manufacturer['slug'] = Str::slug($manufacturer['manuName']);

                unset($manufacturer['linkingTargetTypes']);

                $manufacturerIds[] = $manufacturer['manuId'];
            }

            Manufacturer::insert($output);
        }

        return redirect()->back();
    }
}
