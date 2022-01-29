<?php


namespace App\Repositories\Frontend\Shop\DistributorProducts;


use App\Models\DistributorProduct\DistributorProduct;
use Illuminate\Database\Eloquent\Model;

class DistributorProductsRepository
{
    /**
     * @param integer $distributorProductId
     * @return Model
     */
    public function getDistributorProductById($distributorProductId)
    {
        return DistributorProduct::find((int)$distributorProductId);
    }
}
