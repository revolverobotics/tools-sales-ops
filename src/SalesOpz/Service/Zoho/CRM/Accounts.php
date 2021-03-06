<?php

namespace Revolve\SalesOpz\Service\Zoho\CRM;

use Revolve\SalesOpz\Service\Zoho\CRM\APIMethods;

class Accounts extends APIMethods
{
    public function __construct($authToken)
    {
        parent::__construct($authToken);

        $this->subUrl = 'Accounts';
    }
}
