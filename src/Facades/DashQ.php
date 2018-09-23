<?php

namespace TonySong\DashQ\Facades;

use Illuminate\Support\Facades\Facade;

class DashQ extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dashq';
    }
}
