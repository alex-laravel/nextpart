<?php

namespace App\Models\Delivery\NovaPoshtaCity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NovaPoshtaCity extends Model
{
    use HasFactory;
    use NovaPoshtaCityScope;

    /**
     * @var string
     */
    protected $table = 'de_nova_poshta_cities';

    /**
     * @var array
     */
    protected $fillable = [
        'Ref',
        'Description',
        'DescriptionRu',
        'DescriptionEn',
        'Delivery1',
        'Delivery2',
        'Delivery3',
        'Delivery4',
        'Delivery5',
        'Delivery6',
        'Delivery7',
        'IsBranch',
        'SpecialCashCheck',
        'PreventEntryNewStreetsUser',
        'CityID',
        'SettlementType',
        'SettlementTypeDescription',
        'SettlementTypeDescriptionRu',
        'SettlementTypeDescriptionEn',
        'Area',
        'AreaDescription',
        'AreaDescriptionRu',
        'AreaDescriptionEn',
        'isVisible',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'isVisible' => 'boolean',
    ];
}
