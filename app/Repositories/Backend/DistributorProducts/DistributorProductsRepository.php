<?php


namespace App\Repositories\Backend\DistributorProducts;


use App\Models\DistributorProduct\DistributorProduct;
use App\Repositories\BaseRepository;

class DistributorProductsRepository extends BaseRepository
{
    const MODEL = DistributorProduct::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'sh_distributor_products.*'
            ]);
    }
}
