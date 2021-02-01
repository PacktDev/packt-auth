<?php

namespace Packt\PacktAuth;

trait PacktAuthTrait
{

    protected $defaultRedirect = '/dashboard';

    public function getRedirect()
    {
        return $this->authRedirect ?? $this->defaultRedirect;
    }

    public function initializePacktAuthTrait()
    {
        array_push($this->fillable, 'provider', 'provider_id');
    }

}
