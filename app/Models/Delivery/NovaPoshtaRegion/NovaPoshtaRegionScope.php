<?php


namespace App\Models\Delivery\NovaPoshtaRegion;


use Illuminate\Database\Eloquent\Builder;

trait NovaPoshtaRegionScope
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyIsVisible($query)
    {
        return $query->where('isVisible', true);
    }
}
