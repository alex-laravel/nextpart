<?php


namespace App\Http\Controllers\Api\TecDoc\Manufacturer;


use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Responses\Api\V1\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ApiManufacturerController extends ApiBaseController
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        if (!request()->ajax()) {
            abort(404);
        }

        $manufacturers = $this->manufacturerRepository->getManufacturersOnlyIsVisible();

        return Response::success($this->prepareManufacturersResponse($manufacturers));
    }

    /**
     * @param Collection $manufacturers
     * @return array
     */
    private function prepareManufacturersResponse($manufacturers)
    {
        $response = [];

        foreach ($manufacturers as $manufacturer) {
            $response[] = [
                'id' => $manufacturer->manuId,
                'name' => $manufacturer->manuName
            ];
        }

        return $response;
    }
}
