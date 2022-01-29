<?php


namespace App\Models\TecDoc\VehicleDetails;


use App\Models\TecDoc\Vehicle\Vehicle;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait VehicleDetailsRelationship
{
    /**
     * @return BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'carId', 'carId');
    }
}
