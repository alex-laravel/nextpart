<?php


namespace App\Http\Controllers\Api\Delivery\NovaPoshta;


use App\Http\Controllers\Api\Delivery\ApiDeliveryController;
use App\Http\Responses\Api\V1\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ApiNovaPoshtaCityController extends ApiDeliveryController
{
    /**
     * @param string $area
     * @return JsonResponse
     */
    public function index($area)
    {
        if (!request()->ajax()) {
            abort(404);
        }

        $cities = $this->novaPoshtaCityRepository->getCitiesByAreaOnlyIsVisible($area);

        return Response::success($this->prepareCitiesResponse($cities));
    }

    /**
     * @param Collection $cities
     * @return array
     */
    private function prepareCitiesResponse($cities)
    {
        $response = [];

        foreach ($cities as $city) {
            $response[] = [
                'id' => $city->Ref,
                'description' => $city->Description,
                'descriptionRu' => $city->DescriptionRu,
                'descriptionEn' => $city->DescriptionEn,
            ];
        }

        return $response;
    }
}
