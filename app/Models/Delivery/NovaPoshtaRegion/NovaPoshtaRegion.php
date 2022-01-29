<?php

namespace App\Models\Delivery\NovaPoshtaRegion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NovaPoshtaRegion extends Model
{
    use HasFactory;
    use NovaPoshtaRegionScope;

    /**
     * @var string
     */
    protected $table = 'de_nova_poshta_regions';

    /**
     * @var array
     */
    protected $fillable = [
        'Ref',
        'AreasCenter',
        'Description',
        'DescriptionRu',
        'DescriptionEn',
        'isVisible',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'isVisible' => 'boolean',
    ];
}
