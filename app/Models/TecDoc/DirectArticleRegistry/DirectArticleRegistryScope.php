<?php


namespace App\Models\TecDoc\DirectArticleRegistry;


use Illuminate\Database\Eloquent\Builder;

trait DirectArticleRegistryScope
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyReadyForSyncDetails($query)
    {
        return $query->whereNull('article_details_last_sync_at');
    }
}
