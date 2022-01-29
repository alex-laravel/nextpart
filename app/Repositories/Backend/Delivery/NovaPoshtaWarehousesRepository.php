<?php


namespace App\Repositories\Backend\Delivery;


use App\Models\Delivery\NovaPoshtaWarehouse\NovaPoshtaWarehouse;
use App\Repositories\BaseRepository;

class NovaPoshtaWarehousesRepository extends BaseRepository
{
    const MODEL = NovaPoshtaWarehouse::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'de_nova_poshta_warehouses.*'
            ]);
    }
}
