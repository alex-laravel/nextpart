<?php


namespace App\Models\TecDoc\DirectArticleDocument;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectArticleDocument extends Model
{
    use HasFactory;

    const DIRECT_ARTICLE_DOCUMENT_TYPE_PHOTO = 1;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_CIRCUIT_DIAGRAM = 2;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_TECHNICAL_DRAWING = 3;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_INSTALLATION_MANUAL = 4;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_PICTURE = 5;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_SAFETY_DATA_SHEET = 6;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_GENERAL_CERTIFICATION = 7;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_CERTIFICATE = 8;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_SERVICE_INFORMATION = 9;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_DAMAGE_DIAGNOSIS = 10;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_HOMOLOGATION = 11;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_ASSEMBLY_INFORMATION = 12;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_BROCHURE = 13;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_MANUAL = 14;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_360_DEGREE_PRODUCT_ILLUSTRATION = 16;
    const DIRECT_ARTICLE_DOCUMENT_TYPE_PRODUCT_INFORMATION = 17;

    /**
     * @var string
     */
    protected $table = 'td_direct_article_documents';

    /**
     * @var array
     */
    protected $fillable = [
        'articleId',
        'articleDocId',
        'articleDocTypeId',
        'assetDocumentName',
        'isThumbnail',
    ];
}
