<?php


namespace App\Imports;


use App\Imports\Contracts\DistributorProductCsvImport;

class DistributorProductUniqueTradeCsvImport extends DistributorProductCsvImport
{
    const  HEADING_ROW_COUNT = 1;
    const  HEADING_COLUMNS_COUNT = 14;
    const  HEADING_COLUMNS_HASH = 'e759ab1b60da0e7c9d1511dd4c90e6cd';
    const  QUANTITY_COLUMN_START = 7;

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
            'product_barcode' => $row[4],
            'product_original_no' => $row[1],
            'product_local_no' => $row[0],
            'product_local_name' => trim($row[2]),
            'product_band_name' => trim($row[3]),
            'price' => filter_var($row[6], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'quantity' => (int)filter_var($row[self::QUANTITY_COLUMN_START + $distributorStorageIndex], FILTER_SANITIZE_NUMBER_INT),
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
