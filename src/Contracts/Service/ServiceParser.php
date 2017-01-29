<?php

namespace SalesOpz\Contracts\Service;

interface ServiceParser
{
    /**
     * Perform any necessary parsing functions to make our response data usable.
     *
     * @param  mixed  $response
     * @return array  $response
     */
    public function __construct($response);
}
