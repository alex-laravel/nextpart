<?php

namespace App\Models\TecDoc\Brand;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use BrandAttribute;
    use BrandRelationship;

    /**
     * @var string
     */
    protected $table = 'td_brands';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'brandId',
        'brandLogoID',
        'brandName',
        'brandLogoName',
    ];
}
