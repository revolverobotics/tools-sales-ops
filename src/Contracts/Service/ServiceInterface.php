<?php

namespace SalesOpz\Contracts\Service;

interface ServiceInterface
{
    /**
     * Authorizes the client with a service using the given credentials.
     *
     * @param  mixed  $credentials
     * @return mixed  $grant
     */
    public function authorize($credentials);

    /**
     * Perform any necessary parsing functions to make our response data usable.
     *
     * @param  mixed  $response
     * @return array  $response
     */
    public function parse($response);
}
