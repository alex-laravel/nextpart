<?php

namespace App\Models\TecDoc\ModelSeries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSeries extends Model
{
    use HasFactory;
    use ModelSeriesAttribute;
    use ModelSeriesScope;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_model_series';

    /**
     * @var array
     */
    protected $fillable = [
        'manuId',
        'modelId',
        'modelname',
        'yearOfConstrFrom',
        'yearOfConstrTo',
        'favorFlag',
        'isPopular',
        'isVisible',
        'slug',
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
