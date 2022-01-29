<?php


namespace App\Helpers;


use App\Models\PriceScheme\PriceScheme;

class PriceHelper
{
    const PRICE_PERCENTAGE_DEFAULT = 25;

    /**
     * @var array
     */
    protected $priceSchemes = [];

    /**
     * @param
     */
    public function __construct()
    {
        $this->priceSchemes = PriceScheme::where('price_from', '>=', 0)
            ->where('price_to', '>=', 0)
            ->whereBetween('percentage', [-100, 1000])
            ->get()
            ->toArray();
    }

    /**
     * @param float $basePrice
     * @return float
     */
    public function calculateRetailPrice($basePrice)
    {
        $percentage = $this->calculatePricePercentage($basePrice);

        return number_format(round($basePrice + ($basePrice * $percentage / 100), 4), 4, '.', '');
    }

    /**
     * @param float $basePrice
     * @return integer
     */
    private function calculatePricePercentage($basePrice)
    {
        foreach ($this->priceSchemes as $priceScheme) {
            if ($basePrice > $priceScheme['price_to']) {
                continue;
            }

            if ($basePrice < $priceScheme['price_from']) {
                continue;
            }

            return $priceScheme['percentage'];
        }

        return self::PRICE_PERCENTAGE_DEFAULT;
    }
}
