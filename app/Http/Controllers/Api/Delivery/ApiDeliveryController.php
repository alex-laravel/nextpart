<?php


namespace App\Http\Controllers\Api\Delivery;


use App\Repositories\Frontend\Delivery\NovaPoshtaWarehousesRepository;
use App\Repositories\Frontend\Delivery\NovaPoshtaCitiesRepository;
use App\Repositories\Frontend\Delivery\NovaPoshtaRegionsRepository;

class ApiDeliveryController
{
    /**
     * @var NovaPoshtaRegionsRepository
     */
    protected $novaPoshtaRegionsRepository;

    /**
     * @var NovaPoshtaCitiesRepository
     */
    protected $novaPoshtaCityRepository;

    /**
     * @var NovaPoshtaWarehousesRepository
     */
    protected $novaPoshtaWarehousesRepository;

    /**
     * @param NovaPoshtaRegionsRepository $novaPoshtaRegionsRepository
     * @param NovaPoshtaCitiesRepository $novaPoshtaCityRepository
     * @param NovaPoshtaWarehousesRepository $novaPoshtaWarehousesRepository
     */
    public function __construct(NovaPoshtaRegionsRepository $novaPoshtaRegionsRepository,
                                NovaPoshtaCitiesRepository $novaPoshtaCityRepository,
                                NovaPoshtaWarehousesRepository $novaPoshtaWarehousesRepository)
    {
        $this->novaPoshtaRegionsRepository = $novaPoshtaRegionsRepository;
        $this->novaPoshtaCityRepository = $novaPoshtaCityRepository;
        $this->novaPoshtaWarehousesRepository = $novaPoshtaWarehousesRepository;
    }
}
