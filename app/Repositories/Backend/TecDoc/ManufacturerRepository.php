<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\Manufacturer\Manufacturer;
use App\Repositories\BaseRepository;

class ManufacturerRepository extends BaseRepository
{
    const MODEL = Manufacturer::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_manufacturers.*'
            ]);
    }
}
