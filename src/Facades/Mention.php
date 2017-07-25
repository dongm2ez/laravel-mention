<?php

namespace Dongm2ez\Mention\Facades;

use Illuminate\Support\Facades\Facade;

class Mention extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Dongm2ez\\Mention\\Mention';
    }
}