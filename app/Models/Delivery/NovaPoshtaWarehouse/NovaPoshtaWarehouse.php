<?php

namespace App\Models\Delivery\NovaPoshtaWarehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NovaPoshtaWarehouse extends Model
{
    use HasFactory;
    use NovaPoshtaWarehouseScope;

    /**
     * @var string
     */
    protected $table = 'de_nova_poshta_warehouses';

    /**
     * @var array
     */
    protected $fillable = [
        'SiteKey',
        'Description',
        'DescriptionRu',
        'DescriptionEn',
        'ShortAddress',
        'ShortAddressRu',
        'Phone',
        'TypeOfWarehouse',
        'Ref',
        'Number',
        'CityRef',
        'CityDescription',
        'CityDescriptionRu',
        'CityDescriptionEn',
        'SettlementRef',
        'SettlementDescription',
        'SettlementAreaDescription',
        'SettlementRegionsDescription',
        'SettlementTypeDescription',
        'SettlementTypeDescriptionRu',
        'SettlementTypeDescriptionEn',
        'Longitude',
        'Latitude',
        'PostFinance',
        'BicycleParking',
        'PaymentAccess',
        'POSTerminal',
        'InternationalShipping',
        'SelfServiceWorkplacesCount',
        'TotalMaxWeightAllowed',
        'PlaceMaxWeightAllowed',
        'DistrictCode',
        'WarehouseStatus',
        'WarehouseStatusDate',
        'CategoryOfWarehouse',
        'Direct',
        'RegionCity',
        'WarehouseForAgent',
        'MaxDeclaredCost',
        'WorkInMobileAwis',
        'isVisible',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'isVisible' => 'boolean',
    ];
}
