<?php

namespace App\Models\TecDoc\DirectArticleDetails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectArticleDetails extends Model
{
    use HasFactory;
    use DirectArticleDetailsRelationship;

    /**
     * @var string
     */
    protected $table = 'td_direct_article_details';

    /**
     * @var array
     */
    protected $fillable = [
        'articleId',
        'articleName',
        'articleNo',
        'articleState',
        'articleStateName',
        'brandName',
        'brandNo',
        'flagAccessories',
        'flagCertificationCompulsory',
        'flagRemanufacturedPart',
        'flagSuitedforSelfService',
        'genericArticleId',
        'hasAppendage',
        'hasAxleLink',
        'hasCsGraphics',
        'hasDocuments',
        'hasLessDiscount',
        'hasMarkLink',
        'hasMotorLink',
        'hasOEN',
        'hasPartList',
        'hasPrices',
        'hasSecurityInfo',
        'hasUsage',
        'hasVehicleLink',
        'articleAttributes',
        'articleThumbnails',
        'articleDocuments',
        'articleInfo',
        'articlePrices',
        'eanNumber',
        'immediateAttributs',
        'immediateInfo',
        'mainArticle',
        'oenNumbers',
        'usageNumbers2',
        'replacedByNumber',
        'replacedNumber',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'articleAttributes' => 'array',
        'articleThumbnails' => 'array',
        'articleDocuments' => 'array',
        'articleInfo' => 'array',
        'articlePrices' => 'array',
        'eanNumber' => 'array',
        'immediateAttributs' => 'array',
        'immediateInfo' => 'array',
        'mainArticle' => 'array',
        'oenNumbers' => 'array',
        'usageNumbers2' => 'array',
        'replacedByNumber' => 'array',
        'replacedNumber' => 'array',
    ];
}
