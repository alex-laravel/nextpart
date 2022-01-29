<?php

namespace App\Http\Controllers\Backend\TecDoc\Model;

use App\Http\Controllers\Backend\TecDoc\Model\Traits\ModelVehiclesAssetsSynchronize;
use App\Http\Controllers\Backend\TecDoc\Model\Traits\ModelVehiclesDetailsSynchronize;
use App\Http\Controllers\Backend\TecDoc\Model\Traits\ModelVehiclesSynchronize;
use App\Http\Controllers\Backend\TecDoc\TecDocController;
use App\Models\TecDoc\Country;
use App\Models\TecDoc\CountryGroup;
use Illuminate\Contracts\View\View;

class ModelController extends TecDocController
{
    use ModelVehiclesSynchronize;
    use ModelVehiclesDetailsSynchronize;
    use ModelVehiclesAssetsSynchronize;

    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-models.index', [
            'countries' => Country::orderBy('countryCode')->get(),
            'countryGroups' => CountryGroup::orderBy('tecdocCode')->get(),
            'defaultLanguage' => config('tecdoc.api.country'),
        ]);
    }
}
