<?php

namespace Iteearmah\Footystats;

use Illuminate\Support\Facades\Facade;

class FootystatsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'footystats';
    }
}
