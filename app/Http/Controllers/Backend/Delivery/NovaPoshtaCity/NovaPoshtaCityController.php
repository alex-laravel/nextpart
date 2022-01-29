<?php

namespace App\Http\Controllers\Backend\Delivery\NovaPoshtaCity;

use App\Http\Controllers\Backend\Delivery\NovaPoshtaController;
use App\Models\Delivery\NovaPoshtaCity\NovaPoshtaCity;
use App\Repositories\Backend\Delivery\NovaPoshtaCitiesRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class NovaPoshtaCityController extends NovaPoshtaController
{
    /**
     * @var NovaPoshtaCitiesRepository
     */
    protected $novaPoshtaCityRepository;

    /**
     * @param NovaPoshtaCitiesRepository $novaPoshtaCityRepository
     */
    public function __construct(NovaPoshtaCitiesRepository $novaPoshtaCityRepository)
    {
        $this->novaPoshtaCityRepository = $novaPoshtaCityRepository;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('backend.delivery-nova-poshta-cities.index');
    }

    /**
     * @return RedirectResponse
     */
    public function sync()
    {
        ini_set('max_execution_time', 0);

        Artisan::call('novaposhta:cities');

        $output = Artisan::output();
        $output = json_decode($output, true);

        if (!$this->hasSuccessResponse($output)) {
            return redirect()->back();
        }

        $output = $this->getResponseData($output);

        if (empty($output)) {
            return redirect()->back();
        }

        NovaPoshtaCity::truncate();

        foreach ($output as &$city) {
            $city['DescriptionEn'] = $city['DescriptionRu'];
            $city['SettlementTypeDescriptionEn'] = $city['SettlementTypeDescriptionRu'];
            $city['AreaDescriptionEn'] = $city['AreaDescriptionRu'];
            $city['isVisible'] = true;

            NovaPoshtaCity::create($city);
        }

        return redirect()->back();
    }
}
