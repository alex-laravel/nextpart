<?php

namespace App\Imports;

use App\Models\Distributor\Distributor;
use App\Models\DistributorProduct\DistributorProduct;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;

class DistributorProductImport
{
    const FILE_IMPORT_EXTENSION_CSV = 'csv';

    const DISTRIBUTOR_IMPORT_SLUG_AUTO_TECHNICS = 'auto-technics';
    const DISTRIBUTOR_IMPORT_SLUG_AUTO_TEXNOMIR_ODESSA = 'texnomir-odessa';
    const DISTRIBUTOR_IMPORT_SLUG_AUTO_TEXNOMIR_GERMANIYA = 'texnomir-germaniya';
    const DISTRIBUTOR_IMPORT_SLUG_AUTO_TEXNOMIR_EMIRATY = 'texnomir-emiraty';
    const DISTRIBUTOR_IMPORT_SLUG_AUTO_UNIQUE_TRADE = 'unique-trade';

    /**
     * @param Distributor $distributor
     * @param array $distributorStorageIds
     * @param UploadedFile $distributorFile
     * @return boolean
     * @throws ValidationException
     */
    public static function handle($distributor, $distributorStorageIds, $distributorFile)
    {
        switch (true) {
            case self::isAutoTechnicsCsvImport($distributor->import_slug, $distributorFile->getClientOriginalExtension()):
                self::clear($distributorStorageIds);
                (new DistributorProductAutoTechnicsCsvImport)->import($distributorStorageIds, $distributorFile);
                break;
            case self::isTechnomirCsvImport($distributor->import_slug, $distributorFile->getClientOriginalExtension()):
                self::clear($distributorStorageIds);
                (new DistributorProductTechnomirCsvImport)->import($distributorStorageIds, $distributorFile);
                break;
            case self::isUniqueTradeCsvImport($distributor->import_slug, $distributorFile->getClientOriginalExtension()):
                self::clear($distributorStorageIds);
                (new DistributorProductUniqueTradeCsvImport)->import($distributorStorageIds, $distributorFile);
                break;
            default:
                throw ValidationException::withMessages(['import' => trans('exceptions.backend.distributor_products.import_error')]);
        }

        return true;
    }

    /**
     * @param string $distributorSlug
     * @param string $distributorFileOriginalExtension
     * @return boolean
     */
    private static function isAutoTechnicsCsvImport($distributorSlug, $distributorFileOriginalExtension)
    {
        return $distributorSlug === self::DISTRIBUTOR_IMPORT_SLUG_AUTO_TECHNICS &&
            $distributorFileOriginalExtension === self::FILE_IMPORT_EXTENSION_CSV;
    }

    /**
     * @param string $distributorSlug
     * @param string $distributorFileOriginalExtension
     * @return boolean
     */
    private static function isTechnomirCsvImport($distributorSlug, $distributorFileOriginalExtension)
    {
        return ($distributorSlug === self::DISTRIBUTOR_IMPORT_SLUG_AUTO_TEXNOMIR_ODESSA ||
                $distributorSlug === self::DISTRIBUTOR_IMPORT_SLUG_AUTO_TEXNOMIR_GERMANIYA ||
                $distributorSlug === self::DISTRIBUTOR_IMPORT_SLUG_AUTO_TEXNOMIR_EMIRATY) &&
            $distributorFileOriginalExtension === self::FILE_IMPORT_EXTENSION_CSV;
    }

    /**
     * @param string $distributorSlug
     * @param string $distributorFileOriginalExtension
     * @return boolean
     */
    private static function isUniqueTradeCsvImport($distributorSlug, $distributorFileOriginalExtension)
    {
        return $distributorSlug === self::DISTRIBUTOR_IMPORT_SLUG_AUTO_UNIQUE_TRADE &&
            $distributorFileOriginalExtension === self::FILE_IMPORT_EXTENSION_CSV;
    }

    /**
     * @param array $distributorStorageIds
     * @return void
     */
    private static function clear($distributorStorageIds)
    {
        DistributorProduct::whereIn('distributor_storage_id', $distributorStorageIds)->delete();
    }
}
