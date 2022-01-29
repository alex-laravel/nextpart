<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class Garage extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auto.garage';
    }
}
