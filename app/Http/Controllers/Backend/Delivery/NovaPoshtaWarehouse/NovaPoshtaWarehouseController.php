<?php

namespace App\Http\Controllers\Backend\Delivery\NovaPoshtaWarehouse;

use App\Http\Controllers\Backend\Delivery\NovaPoshtaController;
use App\Models\Delivery\NovaPoshtaCity\NovaPoshtaCity;
use App\Models\Delivery\NovaPoshtaWarehouse\NovaPoshtaWarehouse;
use App\Repositories\Backend\Delivery\NovaPoshtaWarehousesRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class NovaPoshtaWarehouseController extends NovaPoshtaController
{
    /**
     * @var NovaPoshtaWarehousesRepository
     */
    protected $novaPoshtaWarehousesRepository;

    /**
     * @param NovaPoshtaWarehousesRepository $novaPoshtaWarehousesRepository
     */
    public function __construct(NovaPoshtaWarehousesRepository $novaPoshtaWarehousesRepository)
    {
        $this->novaPoshtaWarehousesRepository = $novaPoshtaWarehousesRepository;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('backend.delivery-nova-poshta-warehouses.index');
    }

    /**
     * @return RedirectResponse
     */
    public function sync()
    {
        ini_set('max_execution_time', 0);

        NovaPoshtaWarehouse::truncate();

        NovaPoshtaCity::chunk(200, function ($cities) {
            foreach ($cities as $city) {
                Artisan::call('novaposhta:warehouses', [
                    'cityRef' => $city->Ref
                ]);

                $output = Artisan::output();
                $output = json_decode($output, true);

                if (!$this->hasSuccessResponse($output)) {
                    \Log::alert('******* ******* FAIL NOVA POSHTA WAREHOUSE RESPONSE FOR CITY REF [' . $city->Ref . ']!');
                    continue;
                }

                $output = $this->getResponseData($output);

                if (empty($output)) {
                    \Log::alert('******* EMPTY NOVA POSHTA WAREHOUSE RESPONSE FOR CITY REF [' . $city->Ref . ']!');
                    continue;
                }

                foreach ($output as &$warehouse) {
                    $warehouse['DescriptionEn'] = $warehouse['DescriptionRu'];
                    $warehouse['CityDescriptionEn'] = $warehouse['CityDescriptionRu'];
                    $warehouse['SettlementTypeDescriptionEn'] = $warehouse['SettlementTypeDescriptionRu'];
                    $warehouse['isVisible'] = true;

                    NovaPoshtaWarehouse::create($warehouse);

                    \Log::alert('NOVA POSHTA WAREHOUSE FOR CITY ID [' . $city->id . '] REF [' . $city->Ref . '] CREATED!');
                }
            }
        });

        return redirect()->back();
    }
}
