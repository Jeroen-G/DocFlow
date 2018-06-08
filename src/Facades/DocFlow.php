<?php

namespace JeroenG\DocFlow\Facades;

use Illuminate\Support\Facades\Facade;

class DocFlow extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'docflow';
    }
}
