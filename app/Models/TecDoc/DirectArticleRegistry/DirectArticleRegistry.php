<?php


namespace App\Models\TecDoc\DirectArticleRegistry;


use Illuminate\Database\Eloquent\Model;

class DirectArticleRegistry extends Model
{
    use DirectArticleRegistryScope;

    /**
     * @var string
     */
    protected $table = 'td_direct_article_registry';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'articleId',
        'article_details_last_sync_at',
        'article_documents_last_sync_at',
        'article_analogs_last_sync_at',
    ];
}
