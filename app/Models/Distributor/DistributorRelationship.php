<?php


namespace App\Models\Distributor;


use App\Models\DistributorStorage\DistributorStorage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait DistributorRelationship
{
    /**
     * @return BelongsTo
     */
    public function storages()
    {
        return $this->hasMany(DistributorStorage::class);
    }
}
