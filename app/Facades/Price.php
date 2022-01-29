<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Price extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'price';
    }
}
