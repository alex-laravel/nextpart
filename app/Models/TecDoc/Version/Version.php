<?php

namespace App\Models\TecDoc\Version;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_version';

    /**
     * @var array
     */
    protected $fillable = [
        'build',
        'dataVersion',
        'date',
        'major',
        'minor',
        'revision',
        'refDataVersion'
    ];
}
