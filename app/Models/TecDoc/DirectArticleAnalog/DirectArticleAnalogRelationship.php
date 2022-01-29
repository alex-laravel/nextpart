<?php


namespace App\Models\TecDoc\DirectArticleAnalog;


use App\Models\DistributorProduct\DistributorProduct;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait DirectArticleAnalogRelationship
{
    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(DistributorProduct::class, 'product_original_no', 'articleNo');
    }

    /**
     * @return HasMany
     */
    public function product()
    {
        return $this->products()
            ->where('quantity', '>', 0)
            ->orderByDesc('quantity')
            ->orderBy('price')
            ->limit(1);
    }
}
