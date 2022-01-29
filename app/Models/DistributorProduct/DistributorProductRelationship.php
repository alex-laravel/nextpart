<?php


namespace App\Models\DistributorProduct;


use App\Models\DistributorStorage\DistributorStorage;
use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait DistributorProductRelationship
{
    /**
     * @return HasMany
     */
    public function distributorStorage()
    {
        return $this->belongsTo(DistributorStorage::class);
    }

    /**
     * @return HasMany
     */
    public function articleDetails()
    {
        return $this->belongsTo(DirectArticleDetails::class, 'tecdoc_article_id', 'articleId')->first();
    }
}
