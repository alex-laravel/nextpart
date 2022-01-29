<?php

namespace App\Imports;

use App\Models\DistributorProduct\DistributorProduct;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class DistributorAutoTechnicsImport extends DistributorAbstractImport implements ToCollection, WithCustomCsvSettings
{
    const  HEADING_ROW_COUNT = 1;
    const  HEADING_COLUMNS_COUNT = 11;
    const  QUANTITY_COLUMN_START = 4;
    const  SEPARATOR_SYMBOL = ';';

    /**
     * @var array
     */
    private $distributorStorageIds;

    /**
     * @param array $distributorStorageIds
     */
    public function __construct($distributorStorageIds)
    {
        $this->distributorStorageIds = $distributorStorageIds;
    }

    /**
     * @param Collection $rows
     * @throws ValidationException
     */
    public function collection(Collection $rows)
    {
        $this->clearExistingProducts($this->distributorStorageIds);

        foreach ($rows as $rowIndex => $row) {
            if ($this->isHeading($rowIndex)) {
                if (!$this->hasAllowedHeadingColumnsCount($row)) {
                    throw ValidationException::withMessages(['import' => 'The structure of the imported file does not match the expected.']);
                }

                continue;
            }

            $data = explode(self::SEPARATOR_SYMBOL, $row[0]);

            foreach ($this->distributorStorageIds as $distributorStorageIndex => $distributorStorageId) {
                DistributorProduct::create([
                    'distributor_storage_id' => $distributorStorageId,
                    'product_original_no' => $this->filterOriginalProductNo($data[1]),
                    'product_local_name' => $data[2],
                    'product_band_name' => $data[0],
                    'price' => filter_var($data[3], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
                    'quantity' => (int)filter_var($data[self::QUANTITY_COLUMN_START + $distributorStorageIndex], FILTER_SANITIZE_NUMBER_INT),
                ]);
            }
        }
    }

    /**
     * @return array
     */
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => "\t"
        ];
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
     * @param integer $rowIndex
     * @return boolean
     */
    private function isHeading($rowIndex)
    {
        return $rowIndex <= self::HEADING_ROW_COUNT;
    }

    /**
     * @param array $row
     * @return boolean
     */
    private function hasAllowedHeadingColumnsCount($row)
    {
        return count(explode(self::SEPARATOR_SYMBOL, $row[0])) === self::HEADING_COLUMNS_COUNT;
    }
}
