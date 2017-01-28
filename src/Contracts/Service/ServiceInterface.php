<?php

namespace SalesOpz\Contracts\Service;

use SalesOpz\Contracts\Client\RequestInterface;

interface ServiceInterface extends RequestInterface
{
    public function parseResponse();
}
