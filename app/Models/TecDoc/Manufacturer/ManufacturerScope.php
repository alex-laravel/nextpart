<?php


namespace App\Models\TecDoc\Manufacturer;


use Illuminate\Database\Eloquent\Builder;

trait ManufacturerScope
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyIsFavorite($query)
    {
        return $query->where('favorFlag', true);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyIsPopular($query)
    {
        return $query->where('isPopular', true);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyIsVisible($query)
    {
        return $query->where('isVisible', true)->where('modelsTotal', '>', 0);
    }
}
