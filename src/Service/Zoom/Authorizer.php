<?php

namespace SalesOpz\Service\Zoom;

use SalesOpz\Service\ServiceAuthorizer;

class Authorizer implements ServiceAuthorizer
{
    protected $credentials;

    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    public function authorizeClient()
    {
        // Do something with $this->credentials

        return $grant;
    }
}
