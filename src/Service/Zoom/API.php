<?php

namespace SalesOpz\Service\Zoom;

use Accounts;
use IMGroups;
use Webinars;
use SalesOpz\Service\Service;

class API extends Service
{
    public $accounts;

    public $webinars;

    public function __construct($credentials)
    {
        $this->accounts = new Accounts($credentials);

        $this->imgroups = new IMGroups($credentials);

        $this->webinars = new Webinars($credentials);
    }
}
