<?php


namespace App\Repositories\Frontend\TecDoc;


use App\Models\TecDoc\Manufacturer\Manufacturer;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class ManufacturerRepository extends BaseRepository
{
    const CACHE_QUERY_KEY_ALL = 'query.manufacturers';
    const CACHE_QUERY_KEY_BY_ID = 'query.manufacturer.';
    const CACHE_TIME = 60 * 60;

    /**
     * @return Collection
     */
    public function getManufacturersOnlyIsVisible()
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_ALL, self::CACHE_TIME, function () {
        return Manufacturer::onlyIsVisible()->orderBy('manuName')->get();
//        });
    }

    /**
     * @param integer $manufacturerId
     * @return Manufacturer
     */
    public function getManufacturerById($manufacturerId)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_BY_ID . $manufacturerId, self::CACHE_TIME, function () use ($manufacturerId) {
            return Manufacturer::where('manuId', (int)$manufacturerId)->first();
//        });
    }
}
