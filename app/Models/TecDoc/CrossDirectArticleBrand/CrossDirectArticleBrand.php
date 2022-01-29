<?php


namespace App\Models\TecDoc\CrossDirectArticleBrand;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrossDirectArticleBrand extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'td_cross_direct_article_brand';

    /**
     * @var array
     */
    protected $fillable = [
        'articleId',
        'brandNo',
        'brandName',
    ];
}
