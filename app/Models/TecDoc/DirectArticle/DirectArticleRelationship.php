<?php


namespace App\Models\TecDoc\DirectArticle;


use App\Models\DistributorProduct\DistributorProduct;
use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait DirectArticleRelationship
{
    /**
     * @return HasOne
     */
    public function details()
    {
        return $this->hasOne(DirectArticleDetails::class, 'articleId', 'articleId');
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(DistributorProduct::class, 'product_original_no', 'articleNo');
    }
}
