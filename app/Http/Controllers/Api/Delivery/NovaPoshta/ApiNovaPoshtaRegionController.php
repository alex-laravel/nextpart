<?php


namespace App\Http\Controllers\Api\Delivery\NovaPoshta;


use App\Http\Controllers\Api\Delivery\ApiDeliveryController;
use App\Http\Responses\Api\V1\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ApiNovaPoshtaRegionController extends ApiDeliveryController
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        if (!request()->ajax()) {
            abort(404);
        }

        $regions = $this->novaPoshtaRegionsRepository->getRegionsOnlyIsVisible();

        return Response::success($this->prepareRegionsResponse($regions));
    }

    /**
     * @param Collection $regions
     * @return array
     */
    private function prepareRegionsResponse($regions)
    {
        $response = [];

        foreach ($regions as $region) {
            $response[] = [
                'id' => $region->Ref,
                'description' => $region->Description,
                'descriptionRu' => $region->DescriptionRu,
                'descriptionEn' => $region->DescriptionEn,
            ];
        }

        return $response;
    }
}
