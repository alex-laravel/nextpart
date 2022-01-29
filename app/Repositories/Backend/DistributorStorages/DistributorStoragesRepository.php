<?php


namespace App\Repositories\Backend\DistributorStorages;


use App\Models\DistributorStorage\DistributorStorage;
use App\Repositories\BaseRepository;

class DistributorStoragesRepository extends BaseRepository
{
    const MODEL = DistributorStorage::class;

    /**
     * @param array $request
     * @return DistributorStorage
     */
    public function create($request)
    {
        $distributorStorage = self::MODEL;
        $distributorStorage = new $distributorStorage;
        $distributorStorage->title = !empty($request['title']) ? $request['title'] : null;
        $distributorStorage->description = !empty($request['description']) ? $request['description'] : null;
        $distributorStorage->delivery_days = !empty($request['delivery_days']) ? $request['delivery_days'] : null;
        $distributorStorage->import_sequence_number = !empty($request['import_sequence_number']) ? $request['import_sequence_number'] : 0;
        $distributorStorage->distributor_id = !empty($request['distributor_id']) ? $request['distributor_id'] : null;
        $distributorStorage->save();

        return $distributorStorage;
    }

    /**
     * @param DistributorStorage $distributorStorage
     * @param array $request
     * @return DistributorStorage
     */
    public function update(DistributorStorage $distributorStorage, $request)
    {
        $distributorStorage->title = !empty($request['title']) ? $request['title'] : null;
        $distributorStorage->description = !empty($request['description']) ? $request['description'] : null;
        $distributorStorage->delivery_days = !empty($request['delivery_days']) ? $request['delivery_days'] : null;
        $distributorStorage->import_sequence_number = !empty($request['import_sequence_number']) ? $request['import_sequence_number'] : 0;
        $distributorStorage->distributor_id = !empty($request['distributor_id']) ? $request['distributor_id'] : null;
        $distributorStorage->save();

        return $distributorStorage;
    }

    /**
     * @param DistributorStorage $distributorStorage
     * @return boolean
     */
    public function delete(DistributorStorage $distributorStorage)
    {
        return $distributorStorage->delete();
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'sh_distributor_storages.*'
            ]);
    }
}
