<?php

namespace SalesOpz\Client;

use SalesOpz\Contracts\Service\ServiceAuthorizer;
use SalesOpz\Contracts\Service\ServiceInterface;
use SalesOpz\Contracts\Service\ServiceParser;

abstract class Client
{
    /**
     * Service that the client will interact with.
     *
     * @var ServiceInterface
     */
    public $service;

    /**
     * Variable for storing a response
     *
     * @var mixed
     */
    protected $response;

    public function __construct(ServiceInterface $i)
    {
        $this->service = $i;
    }

    public function authorize($credentials)
    {
        
    }

    public function getResponse()
    {
        return $this->service->parse($this->response);
    }
}

