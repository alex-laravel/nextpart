<?php


namespace App\Models\TecDoc\Brand;


use App\Models\TecDoc\BrandAddress\BrandAddress;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait BrandRelationship
{
    /**
     * @return HasOne
     */
    public function address()
    {
        return $this->hasOne(BrandAddress::class, 'brandId', 'brandId');
    }
}
