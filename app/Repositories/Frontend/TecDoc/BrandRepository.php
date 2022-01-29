<?php


namespace App\Repositories\Frontend\TecDoc;


use App\Models\TecDoc\Brand;
use App\Repositories\BaseRepository;

class BrandRepository extends BaseRepository
{
    /**
     * @param integer $brandId
     * @return Brand
     */
    public function getBrandByBrandId($brandId)
    {
        return Brand::where('brandId', (int)$brandId)->first();
    }
}
