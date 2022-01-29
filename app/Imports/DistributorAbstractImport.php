<?php

namespace App\Imports;

use App\Models\DistributorProduct\DistributorProduct;

abstract class DistributorAbstractImport
{
    /**
    * @param array $distributorStorageIds
    */
    protected function clearExistingProducts($distributorStorageIds)
    {
        DistributorProduct::whereIn('distributor_storage_id', $distributorStorageIds)->delete();
    }
}
