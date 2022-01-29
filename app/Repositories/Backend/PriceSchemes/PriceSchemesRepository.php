<?php


namespace App\Repositories\Backend\PriceSchemes;


use App\Models\PriceScheme\PriceScheme;
use App\Repositories\BaseRepository;

class PriceSchemesRepository extends BaseRepository
{
    const MODEL = PriceScheme::class;

    /**
     * @param array $request
     * @return PriceScheme
     */
    public function create($request)
    {
        $priceScheme = self::MODEL;
        $priceScheme = new $priceScheme;
        $priceScheme->price_from = !empty($request['price_from']) ? (int)$request['price_from'] : 0;
        $priceScheme->price_to = !empty($request['price_to']) ? (int)$request['price_to'] : 0;
        $priceScheme->percentage = !empty($request['percentage']) ? (int)$request['percentage'] : 0;
        $priceScheme->save();

        return $priceScheme;
    }

    /**
     * @param PriceScheme $priceScheme
     * @param array $request
     * @return PriceScheme
     */
    public function update(PriceScheme $priceScheme, $request)
    {
        $priceScheme->price_from = !empty($request['price_from']) ? (int)$request['price_from'] : 0;
        $priceScheme->price_to = !empty($request['price_to']) ? (int)$request['price_to'] : 0;
        $priceScheme->percentage = !empty($request['percentage']) ? (int)$request['percentage'] : 0;
        $priceScheme->save();

        return $priceScheme;
    }

    /**
     * @param PriceScheme $priceScheme
     * @return boolean
     */
    public function delete(PriceScheme $priceScheme)
    {
        return $priceScheme->delete();
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'sh_price_schemes.*'
            ]);
    }
}
