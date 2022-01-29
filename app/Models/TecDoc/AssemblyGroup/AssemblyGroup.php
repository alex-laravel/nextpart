<?php

namespace App\Models\TecDoc\AssemblyGroup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssemblyGroup extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_assembly_groups';

    /**
     * @var array
     */
    protected $fillable = [
        'shortCutId',
        'shortCutName',
        'assemblyGroupNodeId',
        'assemblyGroupName',
        'linkingTargetType',
        'parentNodeId',
        'hasChilds',
        'isVisible',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'hasChilds' => 'boolean',
        'isVisible' => 'boolean',
    ];

    /**
     * @return string
     */
    public function getHasChildsLabelAttribute()
    {
        return $this->hasChilds
            ? '<span class="badge badge-success">Yes</span>'
            : '<span class="badge badge-warning">No</span>';
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

    /**
     * @return string
     */
    public function getLinkingTargetTypeLabelAttribute()
    {
        return '<span class="badge badge-dark">' . $this->linkingTargetType . '</span>';
    }
}
