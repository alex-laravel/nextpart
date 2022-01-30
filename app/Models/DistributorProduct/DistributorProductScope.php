<?php


namespace App\Models\DistributorProduct;


use Illuminate\Database\Eloquent\Builder;

trait DistributorProductScope
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyHasTecDocArticle($query)
    {
        return $query->where('has_tecdoc_article', true);
    }
}
