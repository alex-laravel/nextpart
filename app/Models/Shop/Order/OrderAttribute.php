<?php


namespace App\Models\Shop\Order;


trait OrderAttribute
{
    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case self::ORDER_STATUS_NEW:
                return '<label class="badge badge-warning">' . trans('labels.general.order.status.' . self::ORDER_STATUS_NEW) . '</label>';
            case self::ORDER_STATUS_PENDING:
                return '<label class="badge badge-info">' . trans('labels.general.order.status.' . self::ORDER_STATUS_PENDING) . '</label>';
            case self::ORDER_STATUS_PROCESSING:
                return '<label class="badge badge-primary">' . trans('labels.general.order.status.' . self::ORDER_STATUS_PROCESSING) . '</label>';
            case self::ORDER_STATUS_COMPLETED:
                return '<label class="badge badge-success">' . trans('labels.general.order.status.' . self::ORDER_STATUS_COMPLETED) . '</label>';
            case self::ORDER_STATUS_CANCELED:
                return '<label class="badge badge-warning">' . trans('labels.general.order.status.' . self::ORDER_STATUS_CANCELED) . '</label>';
            case self::ORDER_STATUS_DECLINED:
                return '<label class="badge badge-light">' . trans('labels.general.order.status.' . self::ORDER_STATUS_DECLINED) . '</label>';
            default:
                return '';
        }
    }
    /**
     * @return string
     */
    public function getDeliveryLabelAttribute()
    {
        switch ($this->delivery_method) {
            case self::DELIVERY_METHOD_PICKUP:
                return '<label class="badge badge-success">' . trans('labels.general.order.delivery.' . self::DELIVERY_METHOD_PICKUP) . '</label>';
            case self::DELIVERY_METHOD_NOVA_POSHTA:
                return '<label class="badge badge-info">' . trans('labels.general.order.delivery.' . self::DELIVERY_METHOD_NOVA_POSHTA) . '</label>';
            default:
                return '';
        }
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return
            $this->getShowButtonAttribute();
//            $this->getEditButtonAttribute() .
//            $this->getDeleteButtonAttribute();
    }

    /**
     * @return string
     */
    private function getShowButtonAttribute()
    {
        return '<a href="' . route('backend.orders.show', $this) . '" class="btn btn-sm btn-info"><i class="fas fa-search"></i> ' . trans('buttons.general.view') . '</a> ';
    }

    /**
     * @return string
     */
    private function getEditButtonAttribute()
    {
        return '<a href="' . route('backend.orders.edit', $this) . '" class="btn btn-sm btn-warning"><i class="far fa-edit"></i> ' . trans('buttons.general.edit') . '</a> ';
    }

    /**
     * @return string
     */
    private function getDeleteButtonAttribute()
    {
        return '<a href="' . route('backend.orders.destroy', $this->id) . '"
             data-method="delete"
             data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
             data-trans-button-confirm="' . trans('buttons.general.delete') . '"
             data-trans-title="' . trans('alerts.general.are_you_sure_to_delete') . '"
             class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> ' . trans('buttons.general.delete') . '</a>';
    }
}
