<?php

namespace App\Models\PriceScheme;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceScheme extends Model
{
    use HasFactory;
    use PriceSchemeAttribute;

    /**
     * @var string
     */
    protected $table = 'sh_price_schemes';

    /**
     * @var array
     */
    protected $fillable = [
        'price_from',
        'price_to',
        'percentage',
    ];
}
