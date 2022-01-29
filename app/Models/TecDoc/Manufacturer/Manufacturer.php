<?php

namespace App\Models\TecDoc\Manufacturer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    use ManufacturerAttribute;
    use ManufacturerScope;

    const TEC_DOC_TARGET_TYPE_PASSENGER = 'P';
    const TEC_DOC_TARGET_TYPE_COMMERCIAL = 'O';
    const TEC_DOC_TARGET_TYPE_COMMERCIAL_LIGHT = 'L';
    const TEC_DOC_TARGET_TYPE_AXLES = 'A';
    const TEC_DOC_TARGET_TYPE_MOTOR = 'M';
    const TEC_DOC_TARGET_TYPE_BODY = 'K';
    const TEC_DOC_TARGET_TYPE_UNIVERSAL = 'U';
    const TEC_DOC_TARGET_TYPE_MOTORCYCLES = 'B';

    /**
     * @var string[]
     */
    public static $allowedTargetTypes = [
        self::TEC_DOC_TARGET_TYPE_PASSENGER,
        self::TEC_DOC_TARGET_TYPE_COMMERCIAL,
        self::TEC_DOC_TARGET_TYPE_COMMERCIAL_LIGHT,
        self::TEC_DOC_TARGET_TYPE_AXLES,
        self::TEC_DOC_TARGET_TYPE_MOTOR,
        self::TEC_DOC_TARGET_TYPE_BODY,
        self::TEC_DOC_TARGET_TYPE_UNIVERSAL
    ];

    /**
     * @var string[]
     */
    public static $allowedVehicleTargetTypes = [
        self::TEC_DOC_TARGET_TYPE_PASSENGER,
        self::TEC_DOC_TARGET_TYPE_COMMERCIAL,
        self::TEC_DOC_TARGET_TYPE_COMMERCIAL_LIGHT,
        self::TEC_DOC_TARGET_TYPE_UNIVERSAL
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_manufacturers';

    /**
     * @var array
     */
    protected $fillable = [
        'manuId',
        'manuName',
        'favorFlag',
        'slug',
        'isPopular',
        'isVisible',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'favorFlag' => 'boolean',
        'isPopular' => 'boolean',
        'isVisible' => 'boolean',
    ];
}
