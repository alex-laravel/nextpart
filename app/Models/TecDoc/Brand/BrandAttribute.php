<?php


namespace App\Models\TecDoc\Brand;


trait BrandAttribute
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
        $showButtons = '';

        if (!$this->address()->exists()) {
            return $showButtons;
        }

        foreach ($this->address()->get() as $address) {
            $showButtons .= '<a href="' . route('backend.brands.show', $address->id) . '" class="btn btn-sm btn-info">' . $address->addressName . '</a> ';
        }

        return $showButtons;
    }
}
