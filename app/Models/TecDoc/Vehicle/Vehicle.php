<?php

namespace App\Models\TecDoc\Vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    use VehicleAttribute;
    use VehicleRelationship;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_vehicles';

    /**
     * @var array
     */
    protected $fillable = [
        'manuId',
        'modelId',
        'carId',
        'carType',
        'carName',
        'firstCountry',
        'slug',
    ];
}
