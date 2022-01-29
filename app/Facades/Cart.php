<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Cart extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'shop.cart';
    }
}
