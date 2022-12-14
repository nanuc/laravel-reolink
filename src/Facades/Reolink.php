<?php

namespace Nanuc\LaravelReolink\Facades;

use Illuminate\Support\Facades\Facade;

class Reolink extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'reolink-api';
    }
}