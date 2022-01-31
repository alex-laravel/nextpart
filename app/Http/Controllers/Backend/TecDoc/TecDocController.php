<?php


namespace App\Http\Controllers\Backend\TecDoc;

use App\Http\Controllers\Controller;

class TecDocController extends Controller
{
    const TEC_DOC_TARGET_TYPE_VEHICLE = 'V';          // 2-18
    const TEC_DOC_TARGET_TYPE_PASSENGER = 'P';        // 2-18
    const TEC_DOC_TARGET_TYPE_COMMERCIAL = 'O';       // 19-34
    const TEC_DOC_TARGET_TYPE_COMMERCIAL_LIGHT = 'L'; // 2-18
    const TEC_DOC_TARGET_TYPE_AXLES = 'A';            // 0
    const TEC_DOC_TARGET_TYPE_MOTOR = 'M';            // 0
    const TEC_DOC_TARGET_TYPE_BODY = 'K';             // 19-34
    const TEC_DOC_TARGET_TYPE_UNIVERSAL = 'U';        // 36-43

    const TEC_DOC_ARTICLE_TYPE_ARTICLE = 0;
    const TEC_DOC_ARTICLE_TYPE_OE = 1;
    const TEC_DOC_ARTICLE_TYPE_TRADE = 2;
    const TEC_DOC_ARTICLE_TYPE_COMPARABLE = 3;
    const TEC_DOC_ARTICLE_TYPE_REPLACEMENT = 4;
    const TEC_DOC_ARTICLE_TYPE_REPLACED = 5;
    const TEC_DOC_ARTICLE_TYPE_EAN = 6;
    const TEC_DOC_ARTICLE_TYPE_ANY = 10;

    /**
     * @var string[]
     */
    public static $allowedPassengerAndCommercialLinkingTargetTypes = [
        self::TEC_DOC_TARGET_TYPE_VEHICLE,
        self::TEC_DOC_TARGET_TYPE_COMMERCIAL,
        self::TEC_DOC_TARGET_TYPE_COMMERCIAL_LIGHT,
    ];

    /**
     * @var string[]
     */
    public static $allowedShortCutsLinkingTargetTypes = [
        self::TEC_DOC_TARGET_TYPE_VEHICLE,
        self::TEC_DOC_TARGET_TYPE_COMMERCIAL,
        self::TEC_DOC_TARGET_TYPE_UNIVERSAL
    ];
}
