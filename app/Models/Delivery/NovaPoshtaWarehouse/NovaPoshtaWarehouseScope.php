<?php


namespace App\Models\Delivery\NovaPoshtaWarehouse;


use Illuminate\Database\Eloquent\Builder;

trait NovaPoshtaWarehouseScope
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
