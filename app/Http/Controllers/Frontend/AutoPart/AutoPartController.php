<?php

namespace App\Http\Controllers\Frontend\AutoPart;

use App\Facades\Garage;
use App\Helpers\VinCodeHelper;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\TecDoc\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AutoPartController extends FrontendController
{
    const PRODUCT_PRICE_START = 1;
    const PRODUCT_PRICE_FINISH = 50000;


    /**
     * @param integer $vehicleId
     * @return View
     */
    public function byVehicle($vehicleId)
    {
        $filterApplied = request()->has('filter_brand') || request()->has('filter_price_min') || request()->has('filter_price_max');
        $filterBrands = request()->input('filter_brand');
        $filterBrands = $this->sanitizeFilterBrand($filterBrands);
        $filterPriceMin = (int)request()->input('filter_price_min');
        $filterPriceMax = (int)request()->input('filter_price_max');

        $vehicle = $this->vehicleRepository->getVehicleById($vehicleId);

        if (!$vehicle) {
            abort(404);
        }

        $manufacturer = $this->manufacturerRepository->getManufacturerById($vehicle->manuId);

        if (!$manufacturer) {
            abort(404);
        }

        $modelSeries = $this->modelSeriesRepository->getModelSeriesById($vehicle->modelId);

        if (!$modelSeries) {
            abort(404);
        }

        $activeVehicle = Garage::activateVehicle($manufacturer->manuId, $modelSeries->modelId, $vehicle->carId);

        $parts = $this->directArticleRepository->getDirectArticlesByVehicleIdPaginated($vehicle->carId, $filterApplied, $filterBrands, $filterPriceMin, $filterPriceMax);

        $filterBrandVariants = Brand::orderBy('brandName')->limit(10)->get();

        return view('frontend.auto-parts.vehicle', [
            'activeVehicle' => $activeVehicle,
            'manufacturerId' => $manufacturer->manuId,
            'manufacturerName' => $manufacturer->manuName,
            'modelSeriesId' => $modelSeries->modelId,
            'modelSeriesName' => $modelSeries->modelname,
            'vehicleId' => $vehicle->carId,
            'vehicleName' => $vehicle->carName,
            'parts' => $parts,
            'filterBrandSelected' => $filterBrands,
            'filterBrandVariants' => $filterBrandVariants,
            'filterPriceMinSelected' => $filterPriceMin > 0 ? $filterPriceMin : self::PRODUCT_PRICE_START,
            'filterPriceMaxSelected' => $filterPriceMax > 0 ? $filterPriceMax : self::PRODUCT_PRICE_FINISH,
        ]);
    }

    /**
     * @param integer $shortCutId
     * @return View
     */
    public function byCategory($shortCutId)
    {
        $filterApplied = request()->has('filter_brand') || request()->has('filter_price_min') || request()->has('filter_price_max');
        $filterBrands = request()->input('filter_brand');
        $filterBrands = $this->sanitizeFilterBrand($filterBrands);
        $filterPriceMin = (int)request()->input('filter_price_min');
        $filterPriceMax = (int)request()->input('filter_price_max');

        $shortCut = $this->shortCutRepository->getShortCutByShortCutId($shortCutId);

        if (!$shortCut) {
            abort(404);
        }

        $assemblyGroupNodeIds = $this->assemblyGroupRepository->getLowerAssemblyGroupIdsByParentShortCutId($shortCut->shortCutId);

        $activeVehicle = Garage::getActiveVehicle();

        $parts = $this->directArticleRepository->getDirectArticlesByAssemblyIdsPaginated($assemblyGroupNodeIds, $activeVehicle, $filterApplied, $filterBrands, $filterPriceMin, $filterPriceMax);

        $filterBrandVariants = Brand::orderBy('brandName')->limit(10)->get();

        return view('frontend.auto-parts.category', [
            'activeVehicle' => $activeVehicle,
            'shortCut' => $shortCut,
            'parts' => $parts,
            'filterBrandSelected' => $filterBrands,
            'filterBrandVariants' => $filterBrandVariants,
            'filterPriceMinSelected' => $filterPriceMin > 0 ? $filterPriceMin : self::PRODUCT_PRICE_START,
            'filterPriceMaxSelected' => $filterPriceMax > 0 ? $filterPriceMax : self::PRODUCT_PRICE_FINISH,
        ]);
    }

    /**
     * @param integer $assemblyId
     * @return View
     */
    public function byAssembly($assemblyId)
    {
        $filterApplied = request()->has('filter_brand') || request()->has('filter_price_min') || request()->has('filter_price_max');
        $filterBrands = request()->input('filter_brand');
        $filterBrands = $this->sanitizeFilterBrand($filterBrands);
        $filterPriceMin = (int)request()->input('filter_price_min');
        $filterPriceMax = (int)request()->input('filter_price_max');

        $assemblyGroup = $this->assemblyGroupRepository->getAssemblyGroupByAssemblyGroupId($assemblyId);

        if (!$assemblyGroup) {
            abort(404);
        }

        $assemblyGroupNodeIds = $assemblyGroup->hasChilds
            ? $this->assemblyGroupRepository->getLowerAssemblyGroupIdsByParentAssemblyGroupId($assemblyId)
            : [$assemblyGroup->assemblyGroupNodeId];

        $assemblyGroupNodeIds = array_unique($assemblyGroupNodeIds);

        $activeVehicle = Garage::getActiveVehicle();

        $parts = $this->directArticleRepository->getDirectArticlesByAssemblyIdsPaginated($assemblyGroupNodeIds, $activeVehicle, $filterApplied, $filterBrands, $filterPriceMin, $filterPriceMax);

        $filterBrandVariants = Brand::orderBy('brandName')->limit(10)->get();

        return view('frontend.auto-parts.assembly', [
            'activeVehicle' => $activeVehicle,
            'assemblyGroup' => $assemblyGroup,
            'parts' => $parts,
            'filterBrandSelected' => $filterBrands,
            'filterBrandVariants' => $filterBrandVariants,
            'filterPriceMinSelected' => $filterPriceMin > 0 ? $filterPriceMin : self::PRODUCT_PRICE_START,
            'filterPriceMaxSelected' => $filterPriceMax > 0 ? $filterPriceMax : self::PRODUCT_PRICE_FINISH,
        ]);
    }

    /**
     * @param integer $brandId
     * @return View
     */
    public function byBrand($brandId)
    {
        $filterApplied = request()->has('filter_price_min') || request()->has('filter_price_max');
        $filterPriceMin = (int)request()->input('filter_price_min');
        $filterPriceMax = (int)request()->input('filter_price_max');

        $brand = $this->brandRepository->getBrandByBrandId($brandId);

        if (!$brand) {
            abort(404);
        }

        $activeVehicle = Garage::getActiveVehicle();

        $parts = $this->directArticleRepository->getDirectArticlesByBrandIdPaginated($brand->brandId, $activeVehicle, $filterApplied, $filterPriceMin, $filterPriceMax);

        return view('frontend.auto-parts.brand', [
            'activeVehicle' => $activeVehicle,
            'brand' => $brand,
            'parts' => $parts,
            'filterPriceMinSelected' => $filterPriceMin > 0 ? $filterPriceMin : self::PRODUCT_PRICE_START,
            'filterPriceMaxSelected' => $filterPriceMax > 0 ? $filterPriceMax : self::PRODUCT_PRICE_FINISH,
        ]);
    }

    /**
     * @param integer $partId
     * @return View
     */
    public function partDetails($partId)
    {
        $part = $this->directArticleRepository->getDirectArticleByArticleIdWithDocumentsWithProducts($partId);

        if (!$part) {
            abort(404);
        }

        return view('frontend.auto-parts.part-details', [
            'part' => $part
        ]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function searchByOriginalNoOrVin(Request $request)
    {
        $searchCode = (string)$request->input('searchCode');
        $searchCode = strtoupper($searchCode);

        switch (true) {
            case $this->isVinCode($searchCode):
                return $this->searchByVin($searchCode);
            default:
                return $this->searchByOriginalNo($searchCode);
        }
    }

    /**
     * @param string $partOriginalNo
     * @return View
     */
    private function searchByOriginalNo($partOriginalNo)
    {
        $parts = $this->directArticleRepository->getDirectArticleByArticleNoWithDocumentsWithProducts($partOriginalNo);

        return view('frontend.auto-parts.search', [
            'partNo' => $partOriginalNo,
            'parts' => $parts
        ]);
    }

    /**
     * @param string $vinCode
     * @return View
     */
    private function searchByVin($vinCode)
    {
        Artisan::call('tecdoc:vin-code-decoding', [
            'vinCode' => $vinCode
        ]);

        $output = Artisan::output();
        $output = json_decode($output, true);

        if (!$this->hasSuccessResponse($output)) {
            return view('frontend.auto-parts.search', ['partNo' => $vinCode, 'parts' => []]);
        }

        $output = $this->getResponseData($output);

        if (empty($output)) {
            return view('frontend.auto-parts.search', ['partNo' => $vinCode, 'parts' => []]);
        }

        if (!isset($output['matchingManufacturers']['array'][0]['manuId'])) {
            return view('frontend.auto-parts.search', ['partNo' => $vinCode, 'parts' => []]);
        }

        $manufacturer = $this->manufacturerRepository->getManufacturerById($output['matchingManufacturers']['array'][0]['manuId']);

        if (!$manufacturer) {
            return view('frontend.auto-parts.search', ['partNo' => $vinCode, 'parts' => []]);
        }

        if (!isset($output['matchingModels']['array'][0]['modelId'])) {
            return view('frontend.auto-parts.search', ['partNo' => $vinCode, 'parts' => []]);
        }

        $modelSeries = $this->modelSeriesRepository->getModelSeriesById($output['matchingModels']['array'][0]['modelId']);

        if (!$modelSeries) {
            return view('frontend.auto-parts.search', ['partNo' => $vinCode, 'parts' => []]);
        }

        if (!isset($output['matchingVehicles']['array']) || !is_array($output['matchingVehicles']['array'])) {
            return view('frontend.auto-parts.search', ['partNo' => $vinCode, 'parts' => []]);
        }

        $vehicleIds = array_column($output['matchingVehicles']['array'], 'carId');
        $vehicles = $this->vehicleRepository->getVehiclesByIds($vehicleIds);

        return view('frontend.auto.model', [
            'manufacturer' => $manufacturer,
            'modelSeries' => $modelSeries,
            'vehicles' => $vehicles,
        ]);
    }

    /**
     * @param string $searchCode
     * @return boolean
     */
    private function isVinCode($searchCode)
    {
        return preg_match(VinCodeHelper::PATTERN, $searchCode) === 1;
    }

    /**
     * @param array $filterBrands
     * @return array
     */
    private function sanitizeFilterBrand($filterBrands)
    {
        $filteredBrands = [];

        if (!is_array($filterBrands)) {
            return $filteredBrands;
        }

        foreach ($filterBrands as $filterBrand) {
            $filteredBrand = (int)$filterBrand;

            if ($filteredBrand > 0) {
                $filteredBrands[] = $filteredBrand;
            }
        }

        return $filteredBrands;
    }
}
