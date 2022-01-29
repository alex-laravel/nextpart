<?php

namespace App\Http\Controllers\Backend\Shop\Order;

use App\Http\Controllers\Controller;
use App\Models\Shop\Order\Order;
use App\Repositories\Backend\Shop\OrdersRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
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
     * @return View
     */
    public function index()
    {
        return view('backend.shop-orders.index');
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('backend.shop-orders.create');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function store(Request $request)
    {
        $this->ordersRepository->create($request->only([
            'title'
        ]));

        return view('backend.shop-orders.index')->withFlashSuccess(trans('alerts.backend.orders.created'));
    }

    /**
     * @param Order $order
     * @return View
     */
    public function show(Order $order)
    {
        return view('backend.shop-orders.show', [
            'order' => $order
        ]);
    }

    /**
     * @param Order $order
     * @return View
     */
    public function edit(Order $order)
    {
        return view('backend.shop-orders.edit', [
            'order' => $order
        ]);
    }

    /**
     * @param Request $request
     * @param Order $order
     * @return Response
     */
    public function update(Request $request, Order $order)
    {
        $this->ordersRepository->update($order, $request->only([
            'title'
        ]));

        return view('backend.shop-orders.index')->withFlashSuccess(trans('alerts.backend.orders.updated'));
    }

    /**
     * @param Order $order
     * @return Response
     */
    public function destroy(Order $order)
    {
        $this->ordersRepository->delete($order);

        return back()->withFlashSuccess(trans('alerts.backend.orders.deleted'));
    }
}
