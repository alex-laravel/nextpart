<?php


namespace App\Repositories\Frontend\TecDoc;


use App\Models\TecDoc\ModelSeries\ModelSeries;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class ModelSeriesRepository extends BaseRepository
{
    const CACHE_QUERY_KEY_ALL = 'query.models';
    const CACHE_QUERY_KEY_BY_ID = 'query.model.';
    const CACHE_TIME = 60 * 60;

    /**
     * @param integer $manufacturerId
     * @return Collection
     */
    public function getModelSeriesOnlyIsVisibleByManufacturerId($manufacturerId)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_BY_ID . $manufacturerId, self::CACHE_TIME, function () use ($manufacturerId) {
            return ModelSeries::where('manuId', (int)$manufacturerId)->onlyIsVisible()->orderBy('modelname')->get();
//        });
    }

    /**
     * @param integer $modelId
     * @return ModelSeries
     */
    public function getModelSeriesById($modelId)
    {
//        return Cache::remember(self::CACHE_QUERY_KEY_BY_ID . $modelId, self::CACHE_TIME, function () use ($modelId) {
            return ModelSeries::where('modelId', (int)$modelId)->first();
//        });
    }
}
