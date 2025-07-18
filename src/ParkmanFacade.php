<?php

namespace Paulobunga\Parkman;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Paulobunga\Parkman\Skeleton\SkeletonClass
 */
class ParkmanFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'parkman';
    }
}
