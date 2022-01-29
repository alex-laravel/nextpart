<?php


namespace App\Models\PriceScheme;


trait PriceSchemeAttribute
{
    /**
     * @return string
     */
    public function getPricePercentLabelAttribute()
    {
        if ($this->percentage < 1) {
            return '<label class="badge badge-danger">' . $this->percentage . '%</label>';
        }

        if ($this->percentage <= 25) {
            return '<label class="badge badge-info">' . $this->percentage . '%</label>';
        }

        return '<label class="badge badge-success">' . $this->percentage . '%</label>';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return
            $this->getShowButtonAttribute() .
            $this->getEditButtonAttribute() .
            $this->getDeleteButtonAttribute();
    }

    /**
     * @return string
     */
    private function getShowButtonAttribute()
    {
        return '<a href="' . route('backend.price-schemes.show', $this) . '" class="btn btn-sm btn-info"><i class="fas fa-search"></i> ' . trans('buttons.general.view') . '</a> ';
    }

    /**
     * @return string
     */
    private function getEditButtonAttribute()
    {
        return '<a href="' . route('backend.price-schemes.edit', $this) . '" class="btn btn-sm btn-warning"><i class="far fa-edit"></i> ' . trans('buttons.general.edit') . '</a> ';
    }

    /**
     * @return string
     */
    private function getDeleteButtonAttribute()
    {
        return '<a href="' . route('backend.price-schemes.destroy', $this->id) . '"
             data-method="delete"
             data-trans-button-cancel="' . trans('buttons.general.cancel') . '"
             data-trans-button-confirm="' . trans('buttons.general.delete') . '"
             data-trans-title="' . trans('alerts.general.are_you_sure_to_delete') . '"
             class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> ' . trans('buttons.general.delete') . '</a>';
    }
}
