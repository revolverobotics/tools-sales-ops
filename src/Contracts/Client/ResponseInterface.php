<?php

namespace SalesOpz\Contracts\Client;

interface Response
{
    /**
     * Parse the API response into a usable object or array
     *
     * @param  mixed         $response
     * @return array|object  $response
     */
    public function parse($response);
}
    
