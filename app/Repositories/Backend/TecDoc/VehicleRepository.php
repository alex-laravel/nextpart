<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\Vehicle\Vehicle;
use App\Repositories\BaseRepository;

class VehicleRepository extends BaseRepository
{
    const MODEL = Vehicle::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_vehicles.*'
            ]);
    }
}
