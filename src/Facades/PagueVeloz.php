<?php

namespace BeeDelivery\ItBank\Facades;

use Illuminate\Support\Facades\Facade;

class ItBank extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'itbank';
    }
}
