<?php

namespace App\Http\Controllers\Backend\TecDoc\Manufacturer;

use App\Http\Controllers\Backend\TecDoc\Manufacturer\Traits\ManufacturerModelsSynchronize;
use App\Http\Controllers\Backend\TecDoc\Manufacturer\Traits\ManufacturerSynchronize;
use App\Http\Controllers\Backend\TecDoc\TecDocController;
use App\Models\TecDoc\Country;
use App\Models\TecDoc\CountryGroup;
use Illuminate\Contracts\View\View;

class ManufacturerController extends TecDocController
{
    use ManufacturerSynchronize;
    use ManufacturerModelsSynchronize;

    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-manufacturers.index', [
            'countries' => Country::orderBy('countryCode')->get(),
            'countryGroups' => CountryGroup::orderBy('tecdocCode')->get(),
            'defaultLanguage' => config('tecdoc.api.country'),
        ]);
    }
}
