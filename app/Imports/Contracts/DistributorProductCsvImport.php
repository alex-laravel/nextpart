<?php

namespace App\Imports\Contracts;

use App\Models\DistributorProduct\DistributorProduct;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;

abstract class DistributorProductCsvImport
{
    const DISTRIBUTOR_PRODUCTS_CHUNK = 300;

    /**
     * @var string
     */
    private $storagePath;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->storagePath = storage_path('imports/' . date('Y-m-d'));
    }

    /**
     * @param integer $rowIndex
     * @return boolean
     */
    abstract public function isHeading($rowIndex);

    /**
     * @param array $distributorStorageIds
     * @param UploadedFile $file
     * @return void
     * @throws ValidationException
     */
    public function import($distributorStorageIds, $file)
    {
        $file->move($this->storagePath, $file->getClientOriginalName());
        $file = fopen($this->storagePath . DIRECTORY_SEPARATOR . $file->getClientOriginalName(), 'r');

        $rowData = [];
        $rowIndex = 0;

        while (!feof($file)) {
            $rowIndex++;

            $row = fgetcsv($file, 0, $this->getDelimiter());

            if ($this->isHeading($rowIndex)) {
                if (!$this->hasAllowedHeadingColumnsCount($row)) {
                    throw ValidationException::withMessages(['import' => 'The structure of the imported file does not match the selected distributor.']);
                }

                if (!$this->validHeadingColumnsHash($row)) {
                    throw ValidationException::withMessages(['import' => 'The structure of the imported file does not match the expected.']);
                }

                continue;
            }

            if (empty($row)) {
                continue;
            }

            foreach ($distributorStorageIds as $distributorStorageIndex => $distributorStorageId) {
                $rowData[] = $this->addDistributorProduct($distributorStorageId, $row, $distributorStorageIndex);
            }
        }

        fclose($file);

        foreach (array_chunk($rowData, self::DISTRIBUTOR_PRODUCTS_CHUNK) as $products) {
            DistributorProduct::insert($products);
        }
    }
}
