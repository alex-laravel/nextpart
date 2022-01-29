<?php

namespace App\Models\TecDoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryGroup extends Model
{
    use HasFactory;

    protected $table = 'td_country_groups';

    /**
     * @var array
     */
    protected $fillable = [
        'countryName',
        'tecdocCode',
    ];
}
