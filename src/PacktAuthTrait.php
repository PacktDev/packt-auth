<?php

namespace Packt\PacktAuth;

trait PacktAuthTrait
{

    public $authRedirect = 'http://www.google.com';

    public function initializePacktAuthTrait()
    {
        array_push($this->fillable, 'provider', 'provider_id');
    }

}
