<?php


namespace App\Repositories\Frontend\Delivery;


use App\Models\Delivery\NovaPoshtaCity\NovaPoshtaCity;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class NovaPoshtaCitiesRepository extends BaseRepository
{
    const MODEL = NovaPoshtaCity::class;

    /**
     * @param string
     * @return Collection
     */
    public function getCitiesByAreaOnlyIsVisible($area)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_ALL, self::CACHE_TIME, function () {
        return NovaPoshtaCity::where('Area', (string)$area)->onlyIsVisible()->get();
//        });
    }

    /**
     * @param string $cityRef
     * @return NovaPoshtaCity
     */
    public function getCityByRef($cityRef)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_ALL, self::CACHE_TIME, function () {
        return NovaPoshtaCity::where('Ref', $cityRef)->first();
//        });
    }
}
