<?php

namespace App\Imports;

use App\Imports\Contracts\DistributorProductCsvImport;

class DistributorProductAutoTechnicsCsvImport extends DistributorProductCsvImport
{
    const  HEADING_ROW_COUNT = 1;
    const  HEADING_COLUMNS_COUNT = 11;
    const  HEADING_COLUMNS_HASH = '7f7e98b4bd86a5839e8acbc73e3ed54d';
    const  QUANTITY_COLUMN_START = 4;
    const  SEPARATOR_SYMBOL = ';';

    /**
     * @param integer $distributorStorageId
     * @param string $row
     * @param integer $distributorStorageIndex
     * @return array
     */
    public function addDistributorProduct($distributorStorageId, $row, $distributorStorageIndex)
    {
        $row = $this->explodeProductRow($row);

        return [
            'distributor_storage_id' => $distributorStorageId,
            'product_original_no' => $this->filterOriginalProductNo($row[1]),
            'product_local_name' => $row[2],
            'product_band_name' => $row[0],
            'price' => filter_var($row[3], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
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
     * @param string $row
     * @return boolean
     */
    public function hasAllowedHeadingColumnsCount($row)
    {
        return count($this->explodeProductRow($row)) === self::HEADING_COLUMNS_COUNT;
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
        return "\t";
    }

    /**
     * @param string $value
     * @return string
     */
    private function filterOriginalProductNo($value)
    {
        return substr($value, strpos($value, " ") + 1);
    }

    /**
     * @param string $row
     * @return array
     */
    private function explodeProductRow($row)
    {
        return explode(self::SEPARATOR_SYMBOL, $row[0]);
    }
}
