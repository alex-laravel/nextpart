<?php


namespace App\Models\TecDoc\Vehicle;


trait VehicleAttribute
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getShowButtonAttribute();
    }

    /**
     * @return string
     */
    private function getShowButtonAttribute()
    {
        return $this->details()->exists()
            ? '<a href="' . route('backend.vehicles.show', $this) . '" class="btn btn-sm btn-info"><i class="fas fa-info"></i></a>'
            : '';
    }
}
