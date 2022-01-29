<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\BrandAddresses;
use App\Repositories\BaseRepository;

class BrandAddressRepository extends BaseRepository
{
    const MODEL = BrandAddresses::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_brand_addresses.*'
            ]);
    }
}
