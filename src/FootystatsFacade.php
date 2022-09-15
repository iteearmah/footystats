<?php

namespace Iteearmah\Footystats;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Iteearmah\Footystats\Skeleton\SkeletonClass
 */
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
