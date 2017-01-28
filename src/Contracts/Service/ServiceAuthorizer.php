<?php

namespace SalesOpz\Contracts\Service;

interface ServiceAuthorizer
{
    /**
     * Authorizes the client with a service using the given credentials.
     *
     * @param  mixed  $credentials
     * @return void
     */
    public function authorizeClient($credentials);
}
