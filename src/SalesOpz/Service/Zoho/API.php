<?php

namespace Revolve\SalesOpz\Service\Zoho;

use Revolve\SalesOpz\Service\Service;
use Revolve\SalesOpz\Service\Zoho\Inventory\API as Inventory;
use Revolve\SalesOpz\Service\Zoho\Inventory\CompositeItems;

class API extends Service
{
    public $inventory;

    public function __construct($credentials)
    {
        $this->inventory = new Inventory($credentials);
    }
}
