<?php


namespace App\Models\TecDoc\DirectArticleAnalog;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectArticleAnalog extends Model
{
    use HasFactory;
    use DirectArticleAnalogRelationship;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_direct_article_analogs';

    /**
     * @var array
     */
    protected $fillable = [
        'originalArticleId',
        'originalArticleNo',
        'articleId',
        'articleNo',
        'articleSearchNo',
        'articleName',
        'articleStateId',
        'brandNo',
        'brandName',
        'genericArticleId',
        'numberType',
    ];
}
