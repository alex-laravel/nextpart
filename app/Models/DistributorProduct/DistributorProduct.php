<?php

namespace App\Models\DistributorProduct;

use App\Facades\Price;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorProduct extends Model
{
    use HasFactory;
    use DistributorProductAttribute;
    use DistributorProductRelationship;
    use DistributorProductScope;

    /**
     * @var string
     */
    protected $table = 'sh_distributor_products';

    /**
     * @var array
     */
    protected $fillable = [
        'distributor_storage_id',
        'product_barcode',
        'product_original_no',
        'product_local_no',
        'product_local_name',
        'product_band_name',
        'price',
        'quantity',
    ];

    /**
     * @return float
     */
    public function getRetailPriceAttribute()
    {
        return Price::calculateRetailPrice($this->price);
    }
}
