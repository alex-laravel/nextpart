<?php


namespace App\Http\Controllers\Api;


use App\Repositories\Frontend\TecDoc\ManufacturerRepository;
use App\Repositories\Frontend\TecDoc\ModelSeriesRepository;
use App\Repositories\Frontend\TecDoc\VehicleRepository;

abstract class ApiBaseController
{
    /**
     * @var ManufacturerRepository
     */
    protected $manufacturerRepository;

    /**
     * @var ModelSeriesRepository
     */
    protected $modelSeriesRepository;

    /**
     * @var VehicleRepository
     */
    protected $vehicleRepository;

    /**
     * @param ManufacturerRepository $manufacturerRepository
     * @param ModelSeriesRepository $modelSeriesRepository
     * @param VehicleRepository $vehicleRepository
     */
    public function __construct(ManufacturerRepository $manufacturerRepository,
                                ModelSeriesRepository $modelSeriesRepository,
                                VehicleRepository $vehicleRepository)
    {
        $this->manufacturerRepository = $manufacturerRepository;
        $this->modelSeriesRepository = $modelSeriesRepository;
        $this->vehicleRepository = $vehicleRepository;
    }
}
