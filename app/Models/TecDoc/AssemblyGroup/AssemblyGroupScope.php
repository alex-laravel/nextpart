<?php


namespace App\Models\TecDoc\AssemblyGroup;


use Illuminate\Database\Eloquent\Builder;

trait AssemblyGroupScope
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyIsFinal($query)
    {
        return $query->where('hasChilds', false);
    }
}
