<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\Brand;
use App\Repositories\BaseRepository;

class BrandRepository extends BaseRepository
{
    const MODEL = Brand::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_brands.*'
            ]);
    }
}
