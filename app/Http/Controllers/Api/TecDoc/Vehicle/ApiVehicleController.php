<?php


namespace App\Http\Controllers\Api\TecDoc\Vehicle;


use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Responses\Api\V1\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class ApiVehicleController extends ApiBaseController
{
    /**
     * @param integer $modelId
     * @return JsonResponse
     */
    public function index($modelId)
    {
        if (!request()->ajax()) {
            abort(404);
        }

        $vehicles = $this->vehicleRepository->getVehiclesByModelId($modelId);

        return Response::success($this->prepareVehiclesResponse($vehicles));
    }

    /**
     * @param Collection $vehicles
     * @return array
     */
    private function prepareVehiclesResponse($vehicles)
    {
        $response = [];

        foreach ($vehicles as $vehicle) {
            $response[] = [
                'id' => $vehicle->carId,
                'name' => $vehicle->carName
            ];
        }

        return $response;
    }
}
