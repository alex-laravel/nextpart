<?php

namespace App\Models\TecDoc\ShortCut;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortCut extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_short_cuts';

    /**
     * @var array
     */
    protected $fillable = [
        'shortCutId',
        'shortCutName',
        'linkingTargetType',
        'isVisible',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'isVisible' => 'boolean',
    ];

    /**
     * @return string
     */
    public function getLinkingTargetTypeLabelAttribute()
    {
        return '<span class="badge badge-dark">' . $this->linkingTargetType . '</span>';
    }

    /**
     * @return string
     */
    public function getIsVisibleLabelAttribute()
    {
        return $this->isVisible
            ? '<span class="badge badge-success">Yes</span>'
            : '<span class="badge badge-warning">No</span>';
    }
}
