<?php


namespace App\Http\Controllers\Backend\TecDoc\Vehicle;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\VehicleRepository;

class VehicleAjaxController extends Controller
{
    /**
     * @var VehicleRepository
     */
    protected $vehicleRepository;

    /**
     * @param VehicleRepository $vehicleRepository
     */
    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->vehicleRepository->getData())
            ->addColumn('actions', function ($vehicle) {
                return $vehicle->actionButtons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
