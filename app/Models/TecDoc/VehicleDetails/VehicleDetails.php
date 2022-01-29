<?php

namespace App\Models\TecDoc\VehicleDetails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDetails extends Model
{
    use HasFactory;
    use VehicleDetailsRelationship;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_vehicle_details';

    /**
     * @var array
     */
    protected $fillable = [
        'carId',
        'ccmTech',
        'constructionType',
        'cylinder',
        'cylinderCapacityCcm',
        'cylinderCapacityLiter',
        'fuelType',
        'fuelTypeProcess',
        'impulsionType',
        'manuId',
        'manuName',
        'modId',
        'modelName',
        'motorType',
        'powerHpFrom',
        'powerHpTo',
        'powerKwFrom',
        'powerKwTo',
        'typeName',
        'typeNumber',
        'valves',
        'yearOfConstrFrom',
        'yearOfConstrTo',
        'vehicleDocId',
        'assetThumbnailName',
        'assetImageName',
    ];
}
