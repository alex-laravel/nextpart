<?php

namespace App\Http\Controllers\Backend\Delivery\NovaPoshtaRegion;

use App\Http\Controllers\Backend\Delivery\NovaPoshtaController;
use App\Repositories\Backend\Delivery\NovaPoshtaRegionsRepository;

class NovaPoshtaRegionAjaxController extends NovaPoshtaController
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
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->novaPoshtaRegionsRepository->getData())->make(true);
    }
}
