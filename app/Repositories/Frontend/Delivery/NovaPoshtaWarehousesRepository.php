<?php


namespace App\Repositories\Frontend\Delivery;


use App\Models\Delivery\NovaPoshtaWarehouse\NovaPoshtaWarehouse;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class NovaPoshtaWarehousesRepository extends BaseRepository
{
    const MODEL = NovaPoshtaWarehouse::class;

    /**
     * @param string $cityRef
     * @return Collection
     */
    public function getWarehousesByCityRefOnlyIsVisible($cityRef)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_ALL, self::CACHE_TIME, function () {
        return NovaPoshtaWarehouse::where('CityRef', (string)$cityRef)->onlyIsVisible()->get();
//        });
    }

    /**
     * @param string $warehouseRef
     * @return NovaPoshtaWarehouse
     */
    public function getWarehouseByRef($warehouseRef)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_ALL, self::CACHE_TIME, function () {
        return NovaPoshtaWarehouse::where('Ref', $warehouseRef)->first();
//        });
    }
}
