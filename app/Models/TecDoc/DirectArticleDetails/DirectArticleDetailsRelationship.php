<?php


namespace App\Models\TecDoc\DirectArticleDetails;


use App\Models\DistributorProduct\DistributorProduct;
use App\Models\TecDoc\DirectArticleAnalog\DirectArticleAnalog;
use App\Models\TecDoc\DirectArticleDocument\DirectArticleDocument;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait DirectArticleDetailsRelationship
{
    /**
     * @return HasMany
     */
    public function documents()
    {
        return $this->hasMany(DirectArticleDocument::class, 'articleId', 'articleId');
    }

    /**
     * @return HasMany
     */
    public function thumbnails()
    {
        return $this->documents()
            ->whereIn('articleDocTypeId', [DirectArticleDocument::DIRECT_ARTICLE_DOCUMENT_TYPE_PHOTO, DirectArticleDocument::DIRECT_ARTICLE_DOCUMENT_TYPE_PICTURE])
            ->where('isThumbnail', true);
    }

    /**
     * @return HasMany
     */
    public function photos()
    {
        return $this->documents()
            ->whereIn('articleDocTypeId', [DirectArticleDocument::DIRECT_ARTICLE_DOCUMENT_TYPE_PHOTO, DirectArticleDocument::DIRECT_ARTICLE_DOCUMENT_TYPE_PICTURE])
            ->where('isThumbnail', false);
    }

    /**
     * @return HasMany
     */
    public function analogs()
    {
        return $this->hasMany(DirectArticleAnalog::class, 'originalArticleId', 'articleId');
    }

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
