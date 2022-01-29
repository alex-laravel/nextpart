<?php

namespace App\Models\TecDoc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'td_countries';

    /**
     * @var array
     */
    protected $fillable = [
        'countryCode',
        'countryName',
        'usage',
    ];
}
