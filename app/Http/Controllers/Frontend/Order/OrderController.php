<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Facades\Cart;
use App\Helpers\OrderHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Order\OrderStoreRequest;
use App\Models\Delivery\NovaPoshtaCity\NovaPoshtaCity;
use App\Models\Delivery\NovaPoshtaRegion\NovaPoshtaRegion;
use App\Models\Delivery\NovaPoshtaWarehouse\NovaPoshtaWarehouse;
use App\Models\Shop\Order\Order;
use App\Models\User\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\Frontend\Delivery\NovaPoshtaCitiesRepository;
use App\Repositories\Frontend\Delivery\NovaPoshtaRegionsRepository;
use App\Repositories\Frontend\Delivery\NovaPoshtaWarehousesRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * @var NovaPoshtaRegionsRepository
     */
    protected $novaPoshtaRegionsRepository;

    /**
     * @var NovaPoshtaCitiesRepository
     */
    protected $novaPoshtaCityRepository;

    /**
     * @var NovaPoshtaWarehousesRepository
     */
    protected $novaPoshtaWarehousesRepository;

    /**
     * @param NovaPoshtaRegionsRepository $novaPoshtaRegionsRepository
     * @param NovaPoshtaCitiesRepository $novaPoshtaCityRepository
     * @param NovaPoshtaWarehousesRepository $novaPoshtaWarehousesRepository
     */
    public function __construct(NovaPoshtaRegionsRepository $novaPoshtaRegionsRepository,
                                NovaPoshtaCitiesRepository $novaPoshtaCityRepository,
                                NovaPoshtaWarehousesRepository $novaPoshtaWarehousesRepository)
    {
        $this->novaPoshtaRegionsRepository = $novaPoshtaRegionsRepository;
        $this->novaPoshtaCityRepository = $novaPoshtaCityRepository;
        $this->novaPoshtaWarehousesRepository = $novaPoshtaWarehousesRepository;
    }

    /**
     * @param OrderStoreRequest $request
     * @return Response
     */
    public function store(OrderStoreRequest $request)
    {
        $user = User::where('email', $request->input('customer_email'))->first();

        $deliveryRegion = $this->novaPoshtaRegionsRepository->getRegionByRef($request->input('delivery_nova_poshta_region'));
        $deliveryRegion = $deliveryRegion ? $deliveryRegion->DescriptionRu : null;

        $deliveryCity = $this->novaPoshtaCityRepository->getCityByRef($request->input('delivery_nova_poshta_city'));
        $deliveryCity = $deliveryCity ? $deliveryCity->DescriptionRu : null;

        $deliveryWarehouse = $this->novaPoshtaWarehousesRepository->getWarehouseByRef($request->input('delivery_nova_poshta_warehouse'));
        $deliveryWarehouse = $deliveryWarehouse ? $deliveryWarehouse->DescriptionRu : null;

        $order = $this->createOrder($user, $deliveryRegion, $deliveryCity, $deliveryWarehouse, $request->only([
            'customer_email',
            'customer_first_name',
            'customer_last_name',
            'customer_phone',
            'payment_method',
            'delivery_method',
            'note',
        ]));

        return $order
            ? redirect(RouteServiceProvider::HOME)->withFlashSuccess('Order successfully created!')
            : redirect(RouteServiceProvider::HOME)->withDangerSuccess('Order creation failed!');
    }

    /**
     * @param User $user
     * @param NovaPoshtaRegion $deliveryRegion
     * @param NovaPoshtaCity $deliveryCity
     * @param NovaPoshtaWarehouse $deliveryWarehouse
     * @param array $request
     * @return Order
     */
    private function createOrder($user, $deliveryRegion, $deliveryCity, $deliveryWarehouse, $request)
    {

        DB::transaction(function () use ($user, $deliveryRegion, $deliveryCity, $deliveryWarehouse, $request) {
            $order = new Order();
            $order->number = OrderHelper::generateOrderNumber(Order::max('id'));
            $order->user_id = $user ? $user->id : null;
            $order->cart = Cart::getCart();
            $order->cart_quantity = count(Cart::getCart());
            $order->cart_total = productPriceRounded(Cart::totalPrice());
            $order->payment_method = !empty($request['payment_method']) ? $request['payment_method'] : null;;
            $order->customer_email = !empty($request['customer_email']) ? $request['customer_email'] : null;
            $order->customer_first_name = !empty($request['customer_first_name']) ? $request['customer_first_name'] : null;
            $order->customer_last_name = !empty($request['customer_last_name']) ? $request['customer_last_name'] : null;
            $order->customer_phone = !empty($request['customer_phone']) ? $request['customer_phone'] : null;
            $order->delivery_method = !empty($request['delivery_method']) ? $request['delivery_method'] : null;
            $order->delivery_region = $deliveryRegion;
            $order->delivery_city = $deliveryCity;
            $order->delivery_warehouse = $deliveryWarehouse;
            $order->note = !empty($request['note']) ? $request['note'] : null;
            $order->save();

            Cart::clearCart();

            return $order;
        });

        return null;
    }
}
