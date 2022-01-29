<?php

namespace App\Http\Controllers\Backend\Delivery\NovaPoshtaCity;

use App\Http\Controllers\Backend\Delivery\NovaPoshtaController;
use App\Repositories\Backend\Delivery\NovaPoshtaCitiesRepository;

class NovaPoshtaCityAjaxController extends NovaPoshtaController
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
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->novaPoshtaCityRepository->getData())->make(true);
    }
}
