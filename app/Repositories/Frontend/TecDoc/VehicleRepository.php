<?php


namespace App\Repositories\Frontend\TecDoc;


use App\Models\TecDoc\Vehicle\Vehicle;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class VehicleRepository extends BaseRepository
{
    const CACHE_QUERY_KEY_ALL = 'query.vehicles';
    const CACHE_QUERY_KEY_BY_ID = 'query.vehicle.';
    const CACHE_TIME = 60 * 60;

    /**
     * @param integer $modelId
     * @return Collection
     */
    public function getVehiclesByModelId($modelId)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_ALL, self::CACHE_TIME, function () use ($modelId) {
            return Vehicle::where('modelId', (int)$modelId)->orderBy('carName')->get();
//        });
    }

    /**
     * @param integer $vehicleId
     * @return Vehicle
     */
    public function getVehicleById($vehicleId)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_BY_ID . $vehicleId, self::CACHE_TIME, function () use ($vehicleId) {
            return Vehicle::where('carId', $vehicleId)->first();
//        });
    }

    /**
     * @param array $carIds
     * @return Collection
     */
    public function getVehiclesByIds($carIds)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_ALL, self::CACHE_TIME, function () use ($modelId) {
        return Vehicle::whereIn('carId', $carIds)->orderBy('carName')->get();
//        });
    }
}
