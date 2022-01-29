<?php

namespace App\Models\TecDoc\ModelSeries;

use Illuminate\Database\Eloquent\Builder;

trait ModelSeriesScope
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyIsVisible($query)
    {
        return $query->where('isVisible', true)->where('vehiclesTotal', '>', 0);
    }
}
