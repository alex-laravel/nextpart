<?php


namespace App\Models\TecDoc\CrossDirectArticleAssemblyGroup;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrossDirectArticleAssemblyGroup extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_cross_direct_article_assembly_group';

    /**
     * @var array
     */
    protected $fillable = [
        'articleId',
        'assemblyGroupNodeId',
        'linkingTargetType',
    ];
}
