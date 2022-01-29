<?php

namespace App\Http\Controllers\Backend\Shop\Order;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Shop\OrdersRepository;
use Illuminate\Http\Request;

class OrderAjaxController extends Controller
{
    /**
     * @var OrdersRepository
     */
    protected $ordersRepository;

    /**
     * @param OrdersRepository $ordersRepository
     */
    public function __construct(OrdersRepository $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->ordersRepository->getData())
            ->editColumn('cart_total', function ($order) {
                return $order->cart_total . ' ' . trans('strings.general.hrn');
            })
            ->editColumn('status', function ($order) {
                return $order->statusLabel;
            })
            ->editColumn('delivery_method', function ($order) {
                return $order->deliveryLabel;
            })
            ->editColumn('created_at', function ($order) {
                return $order->created_at ? $order->created_at->format('d/m/Y H:i:s') : '';
            })
            ->editColumn('updated_at', function ($order) {
                return $order->updated_at ? $order->updated_at->format('d/m/Y H:i:s') : '';
            })
            ->addColumn('actions', function ($order) {
                return $order->actionButtons;
            })
            ->rawColumns(['status', 'delivery_method', 'actions'])
            ->make(true);
    }
}
