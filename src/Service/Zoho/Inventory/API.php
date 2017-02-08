<?php

namespace Revolve\SalesOpz\Service\Zoho\Inventory;

use Revolve\SalesOpz\Service\Service;

class API
{
    public $items;

    public $compositeItems;

    public function __construct($credentials)
    {
        $this->items = new Items($credentials);

        $this->compositeItems = new CompositeItems($credentials);
    }
}
