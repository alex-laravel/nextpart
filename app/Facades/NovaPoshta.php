<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class NovaPoshta extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'novaposhta';
    }
}
