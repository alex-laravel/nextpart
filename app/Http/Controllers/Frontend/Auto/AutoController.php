<?php

namespace App\Http\Controllers\Frontend\Auto;

use App\Facades\Garage;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class AutoController extends FrontendController
{
    /**
     * @return View
     */
    public function index()
    {
        $manufacturers = $this->manufacturerRepository->getManufacturersOnlyIsVisible();

        return view('frontend.auto.index', [
            'manufacturers' => $manufacturers,
        ]);
    }

    /**
     * @param string $manufacturer
     * @return View
     */
    public function manufacturer($manufacturer)
    {
        $manufacturer = $this->manufacturerRepository->getManufacturerById($manufacturer);

        if (!$manufacturer) {
            abort(404);
        }

        $modelSeries = $this->modelSeriesRepository->getModelSeriesOnlyIsVisibleByManufacturerId($manufacturer->manuId);

        return view('frontend.auto.manufacturer', [
            'manufacturer' => $manufacturer,
            'modelSeries' => $modelSeries,
        ]);
    }

    /**
     * @param string $manufacturer
     * @param string $model
     * @return View
     */
    public function model($manufacturer, $model)
    {
        $manufacturer = $this->manufacturerRepository->getManufacturerById($manufacturer);

        if (!$manufacturer) {
            abort(404);
        }

        $modelSeries = $this->modelSeriesRepository->getModelSeriesById($model);

        if (!$modelSeries) {
            abort(404);
        }

        $vehicles = $this->vehicleRepository->getVehiclesByModelId($model);

        return view('frontend.auto.model', [
            'manufacturer' => $manufacturer,
            'modelSeries' => $modelSeries,
            'vehicles' => $vehicles,
        ]);
    }

    /**
     * @param string $manufacturer
     * @param string $model
     * @param string $vehicle
     * @return RedirectResponse
     */
    public function vehicle($manufacturer, $model, $vehicle)
    {
        $manufacturer = $this->manufacturerRepository->getManufacturerById($manufacturer);

        if (!$manufacturer) {
            abort(404);
        }

        $modelSeries = $this->modelSeriesRepository->getModelSeriesById($model);

        if (!$modelSeries) {
            abort(404);
        }

        $vehicle = $this->vehicleRepository->getVehicleById($vehicle);

        if (!$vehicle) {
            abort(404);
        }

        Garage::addVehicle($manufacturer->manuId, $manufacturer->manuName, $modelSeries->modelId, $modelSeries->modelname, $vehicle->carId, $vehicle->carName);

        return redirect()->route('frontend.parts.vehicle', $vehicle->carId);
    }
}
