<?php


namespace App\Models\Delivery\NovaPoshtaCity;


use Illuminate\Database\Eloquent\Builder;

trait NovaPoshtaCityScope
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
