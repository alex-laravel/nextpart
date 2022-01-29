<?php

namespace App\Http\Controllers\Backend\Delivery\NovaPoshtaWarehouse;

use App\Http\Controllers\Backend\Delivery\NovaPoshtaController;
use App\Repositories\Backend\Delivery\NovaPoshtaWarehousesRepository;

class NovaPoshtaWarehouseAjaxController extends NovaPoshtaController
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
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->novaPoshtaWarehousesRepository->getData())->make(true);
    }
}
