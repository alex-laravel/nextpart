<?php


namespace App\Repositories\Backend\Shop;


use App\Models\Shop\Order\Order;
use App\Repositories\BaseRepository;

class OrdersRepository extends BaseRepository
{
    const MODEL = Order::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'sh_orders.*'
            ]);
    }
}
