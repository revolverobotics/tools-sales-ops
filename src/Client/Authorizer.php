<?php

namespace SalesOpz\Client;

use SalesOpz\Service\ServiceAuthorizer;

abstract class Authorizer implements ServiceAuthorizer
{
    /**
     * Credentials used to authorize the client.
     *
     * @var mixed
     */
    protected $credentials;

    public function __construct($credentials)
    {
        return $this->authorize($credentials);
    }

    /**
     * Authorizes the client with a service using the given credentials.
     *
     * @param  mixed  $credentials
     * @return mixed  $grant
     */
    public function authorize($credentials)
    {
        // Do something with $this->credentials

        return $grant;
    }
}
