<?php


namespace App\Repositories\Backend\Delivery;


use App\Models\Delivery\NovaPoshtaRegion\NovaPoshtaRegion;
use App\Repositories\BaseRepository;

class NovaPoshtaRegionsRepository extends BaseRepository
{
    const MODEL = NovaPoshtaRegion::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'de_nova_poshta_regions.*'
            ]);
    }
}
