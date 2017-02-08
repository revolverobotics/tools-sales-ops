<?php

namespace Revolve\SalesOpz\Service\Zoho\Inventory;

class API
{
    public $items;

    public $compositeItems;

    public function __construct($credentials)
    {
        $this->items = new Items($credentials);
    }
}
