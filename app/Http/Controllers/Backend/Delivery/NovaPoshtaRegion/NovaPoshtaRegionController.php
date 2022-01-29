<?php

namespace App\Http\Controllers\Backend\Delivery\NovaPoshtaRegion;

use App\Http\Controllers\Backend\Delivery\NovaPoshtaController;
use App\Models\Delivery\NovaPoshtaRegion\NovaPoshtaRegion;
use App\Repositories\Backend\Delivery\NovaPoshtaRegionsRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class NovaPoshtaRegionController extends NovaPoshtaController
{
    /**
     * @var NovaPoshtaRegionsRepository
     */
    protected $novaPoshtaRegionsRepository;

    /**
     * @param NovaPoshtaRegionsRepository $novaPoshtaRegionsRepository
     */
    public function __construct(NovaPoshtaRegionsRepository $novaPoshtaRegionsRepository)
    {
        $this->novaPoshtaRegionsRepository = $novaPoshtaRegionsRepository;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('backend.delivery-nova-poshta-regions.index');
    }

    /**
     * @return RedirectResponse
     */
    public function sync()
    {
        ini_set('max_execution_time', 0);

        Artisan::call('novaposhta:regions');

        $output = Artisan::output();
        $output = json_decode($output, true);

        if (!$this->hasSuccessResponse($output)) {
            return redirect()->back();
        }

        $output = $this->getResponseData($output);

        if (empty($output)) {
            return redirect()->back();
        }

        NovaPoshtaRegion::truncate();

        foreach ($output as &$region) {
            $region['DescriptionEn'] = $region['DescriptionRu'];
            $region['isVisible'] = true;

            NovaPoshtaRegion::create($region);
        }

        return redirect()->back();
    }
}
