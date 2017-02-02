<?php

namespace SalesOpz\Service\Zoho\CRM;

use SalesOpz\Service\Zoho\CRM\APIMethods;

class Accounts extends APIMethods
{
    public function __construct($authToken)
    {
        parent::__construct($authToken);

        $this->subUrl = 'Accounts';
    }
}
