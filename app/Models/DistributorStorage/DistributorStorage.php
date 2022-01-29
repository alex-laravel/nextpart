<?php

namespace App\Models\DistributorStorage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorStorage extends Model
{
    use HasFactory;
    use DistributorStorageAttribute;
    use DistributorStorageRelationship;

    /**
     * @var string
     */
    protected $table = 'sh_distributor_storages';

    /**
     * @var array
     */
    protected $fillable = [
        'distributor_id',
        'title',
        'description',
        'delivery_days',
        'import_sequence_number',
    ];
}
