<?php


namespace App\Repositories\Backend\Delivery;


use App\Models\Delivery\NovaPoshtaCity\NovaPoshtaCity;
use App\Repositories\BaseRepository;

class NovaPoshtaCitiesRepository extends BaseRepository
{
    const MODEL = NovaPoshtaCity::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'de_nova_poshta_cities.*'
            ]);
    }
}
