<?php

namespace mergimuka\AHVValidator\Facades;

use Illuminate\Support\Facades\Facade;

class AHVValidator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ahvvalidator';
    }
}
