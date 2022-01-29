<?php


namespace App\Models\TecDoc;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpDirectArticleUnique extends Model
{
    use HasFactory;

    protected $table = 'td_tmp_direct_article_unique';

    /**
     * @var array
     */
    protected $fillable = [
        'articleId',
    ];
}
