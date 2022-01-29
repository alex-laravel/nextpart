<?php


namespace App\Models\DistributorStorage;


use App\Models\Distributor\Distributor;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait DistributorStorageRelationship
{
    /**
     * @return HasMany
     */
    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }
}
