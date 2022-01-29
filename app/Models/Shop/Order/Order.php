<?php


namespace App\Models\Shop\Order;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use OrderAttribute;
    use OrderRelationship;

    const ORDER_STATUS_NEW = 'new';
    const ORDER_STATUS_PENDING = 'pending';
    const ORDER_STATUS_PROCESSING = 'processing';
    const ORDER_STATUS_COMPLETED = 'completed';
    const ORDER_STATUS_CANCELED = 'canceled';
    const ORDER_STATUS_DECLINED = 'declined';

    const DELIVERY_METHOD_PICKUP = 'pickup';
    const DELIVERY_METHOD_NOVA_POSHTA = 'novaPoshta';

    const PAYMENT_METHOD_CASH_ON_RECEIPT = 'cashOnReceipt';
    const PAYMENT_METHOD_CASH_ON_DELIVERY = 'cashOnDelivery';

    /**
     * @var array
     */
    public static $allowedDeliveryMethods = [
        self::DELIVERY_METHOD_PICKUP,
        self::DELIVERY_METHOD_NOVA_POSHTA,
    ];

    /**
     * @var array
     */
    public static $allowedPaymentMethods = [
        self::PAYMENT_METHOD_CASH_ON_RECEIPT,
        self::PAYMENT_METHOD_CASH_ON_DELIVERY,
    ];

    /**
     * @var string
     */
    protected $table = 'sh_orders';

    /**
     * @var array
     */
    protected $fillable = [
        'number',
        'user_id',
        'cart',
        'cart_quantity',
        'cart_total',
        'status',
        'payment_id',
        'payment_method',
        'payment_status',
        'customer_email',
        'customer_first_name',
        'customer_last_name',
        'customer_phone',
        'delivery_method',
        'delivery_region',
        'delivery_city',
        'delivery_warehouse',
        'notes',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'cart' => 'array',
    ];
}
