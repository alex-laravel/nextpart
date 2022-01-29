<?php


namespace App\Repositories\Frontend\Delivery;


use App\Models\Delivery\NovaPoshtaRegion\NovaPoshtaRegion;
use App\Models\TecDoc\Manufacturer\Manufacturer;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class NovaPoshtaRegionsRepository extends BaseRepository
{
    const MODEL = NovaPoshtaRegion::class;

    /**
     * @return Collection
     */
    public function getRegionsOnlyIsVisible()
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_ALL, self::CACHE_TIME, function () {
        return NovaPoshtaRegion::onlyIsVisible()->get();
//        });
    }

    /**
     * @param string $regionRef
     * @return NovaPoshtaRegion
     */
    public function getRegionByRef($regionRef)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_ALL, self::CACHE_TIME, function () {
        return NovaPoshtaRegion::where('Ref', $regionRef)->first();
//        });
    }
}
