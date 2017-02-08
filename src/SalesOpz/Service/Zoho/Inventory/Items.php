<?php

namespace Revolve\SalesOpz\Service\Zoho\Inventory;

use Revolve\SalesOpz\Client\Client;

class Items extends Client
{
    /**
     * Authentication data used for accessing the API.
     *
     * @var string
     */
    protected $credentials;

    /**
     * The base Zoom API url.
     *
     * @var string
     */
    protected $baseUrl = 'https://inventory.zoho.com/api/v1/';

    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }
}
