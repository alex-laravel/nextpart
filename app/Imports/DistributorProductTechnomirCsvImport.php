<?php


namespace App\Imports;


use App\Imports\Contracts\DistributorProductCsvImport;

class DistributorProductTechnomirCsvImport extends DistributorProductCsvImport
{
    const  HEADING_ROW_COUNT = 1;
    const  HEADING_COLUMNS_COUNT = 11;
    const  HEADING_COLUMNS_HASH = '4896970fc0dadf308e85352776da3be9';

    /**
     * @param integer $distributorStorageId
     * @param array $row
     * @param integer $distributorStorageIndex
     * @return array
     */
    public function addDistributorProduct($distributorStorageId, $row, $distributorStorageIndex)
    {
        return [
            'distributor_storage_id' => $distributorStorageId,
            'product_original_no' => $row[7],
            'product_local_name' => $row[2],
            'product_band_name' => $row[0],
            'price' => filter_var($row[10], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'quantity' => (int)filter_var($row[3], FILTER_SANITIZE_NUMBER_INT),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

    /**
     * @param integer $rowIndex
     * @return boolean
     */
    public function isHeading($rowIndex)
    {
        return $rowIndex <= self::HEADING_ROW_COUNT;
    }

    /**
     * @param array $row
     * @return boolean
     */
    public function hasAllowedHeadingColumnsCount($row)
    {
        return count($row) === self::HEADING_COLUMNS_COUNT;
    }

    /**
     * @param string $row
     * @return boolean
     */
    public function validHeadingColumnsHash($row)
    {
        return md5(implode($this->getDelimiter(), $row)) === self::HEADING_COLUMNS_HASH;
    }

    /**
     * @return string
     */
    public function getDelimiter()
    {
        return ',';
    }
}
