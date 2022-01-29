<?php

namespace App\Imports;

use App\Models\DistributorProduct\DistributorProduct;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;

class DistributorTehnomirImport extends DistributorAbstractImport implements ToCollection
{
    const HEADING_ROW_COUNT = 0;
    const HEADING_COLUMNS_COUNT = 11;

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

            foreach ($this->distributorStorageIds as $distributorStorageId) {
                DistributorProduct::create([
                    'distributor_storage_id' => $distributorStorageId,
                    'product_original_no' => $row[7],
                    'product_local_name' => $row[2],
                    'product_band_name' => $row[0],
                    'price' => filter_var($row[10], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
                    'quantity' => (int)filter_var($row[3], FILTER_SANITIZE_NUMBER_INT)
                ]);
            }
        }
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
        return count($row) === self::HEADING_COLUMNS_COUNT;
    }
}
