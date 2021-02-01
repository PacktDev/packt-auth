<?php

namespace Packt\PacktAuth;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Packt\PacktAuth\PacktAuth
 */
class PacktAuthFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'packt-auth';
    }
}
