<?php

namespace SalesOpz\Service\Zoho\CRM;

use Leads;
use Contacts;
use Accounts;
use Potentials;
use SalesOpz\Service\Service;

class API extends Service
{
    public $leads;

    public $contacts;

    public $accounts;

    public $potentials;

    public function __construct($authToken)
    {
        $this->leads      = new Leads($authToken);
        $this->contacts   = new Contacts($authToken);
        $this->accounts   = new Accounts($authToken);
        $this->potentials = new Potentials($authToken);
    }
}
