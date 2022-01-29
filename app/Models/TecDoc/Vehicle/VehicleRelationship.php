<?php

namespace App\Models\TecDoc\Vehicle;

use App\Models\TecDoc\VehicleDetails\VehicleDetails;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait VehicleRelationship
{
    /**
     * @return HasOne
     */
    public function details()
    {
        return $this->hasOne(VehicleDetails::class, 'carId', 'carId');
    }
}
