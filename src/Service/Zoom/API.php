<?php

namespace SalesOpz\Service\Zoom;

use Accounts;
use Webinars;
use SalesOpz\Service\Service;

class API extends Service
{
    public $accounts;

    public $webinars;

    public function __construct()
    {
        $this->accounts = new Accounts();

        $this->webinars = new Webinars();
    }
}
