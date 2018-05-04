<?php

namespace AppPackers\LaravelBag;

use Illuminate\Support\Facades\Facade;

/**
 * Class BagFacade.
 */
class BagFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bag';
    }
}
