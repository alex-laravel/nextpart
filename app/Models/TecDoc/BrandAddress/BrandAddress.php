<?php

namespace App\Models\TecDoc\BrandAddress;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandAddress extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_brand_addresses';

    /**
     * @var array
     */
    protected $fillable = [
        'brandId',
        'addressName',
        'addressType',
        'city',
        'city2',
        'email',
        'fax',
        'logoDocId',
        'mailbox',
        'name',
        'name2',
        'phone',
        'street',
        'street2',
        'wwwURL',
        'zip',
        'zipCountryCode',
        'zipMailbox',
        'zipSpecial',
    ];
}
