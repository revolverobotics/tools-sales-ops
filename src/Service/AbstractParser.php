<?php

namespace SalesOpz\Service;

use SalesOpz\Contracts\Service\ServiceParser;

abstract class AbstractParser implements ServiceParser
{
    /**
     * Perform any necessary parsing functions to make our response data usable.
     *
     * @param  mixed  $response
     * @return array  $response
     */
    abstract public function parse($response);
}