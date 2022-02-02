<?php

namespace Usanzadunje\Vue\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Usanzadunje\Vue\Vue
 */
class Vue extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'artisan-vue';
    }
}
