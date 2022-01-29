<?php

namespace App\Http\Requests\Frontend\Order;

use App\Models\Shop\Order\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'customer_email' => 'required|string|email|max:255',
            'customer_first_name' => 'required|string|max:255',
            'customer_last_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:13',
            'delivery_method' => 'required|string|in:' . implode(",", Order::$allowedDeliveryMethods),
            'payment_method' => 'required|string|in:' . implode(",", Order::$allowedPaymentMethods),
            'note' => 'nullable|string|max:455',
            'delivery_nova_poshta_region' => 'required_if:delivery_method,==,' . Order::DELIVERY_METHOD_NOVA_POSHTA,
            'delivery_nova_poshta_city' => 'required_if:delivery_method,==,' . Order::DELIVERY_METHOD_NOVA_POSHTA,
            'delivery_nova_poshta_warehouse' => 'required_if:delivery_method,==,' . Order::DELIVERY_METHOD_NOVA_POSHTA,
        ];
    }
}
