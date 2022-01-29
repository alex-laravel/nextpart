<?php


namespace App\Http\Controllers\Api\Delivery\NovaPoshta;


use App\Http\Controllers\Api\Delivery\ApiDeliveryController;
use App\Http\Responses\Api\V1\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ApiNovaPoshtaWarehouseController extends ApiDeliveryController
{
    /**
     * @param string $cityRef
     * @return JsonResponse
     */
    public function index($cityRef)
    {
        if (!request()->ajax()) {
            abort(404);
        }

        $warehouses = $this->novaPoshtaWarehousesRepository->getWarehousesByCityRefOnlyIsVisible($cityRef);

        return Response::success($this->prepareManufacturersResponse($warehouses));
    }

    /**
     * @param Collection $warehouses
     * @return array
     */
    private function prepareManufacturersResponse($warehouses)
    {
        $response = [];

        foreach ($warehouses as $warehouse) {
            $response[] = [
                'id' => $warehouse->Ref,
                'description' => $warehouse->Description,
                'descriptionRu' => $warehouse->DescriptionRu,
                'descriptionEn' => $warehouse->DescriptionEn,
            ];
        }

        return $response;
    }
}
