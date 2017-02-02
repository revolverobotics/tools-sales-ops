<?php

namespace SalesOpz\Service\Zoho\CRM;

use SalesOpz\Service\Zoho\CRM\APIMethods;

class Contacts extends APIMethods
{
    public function __construct($authToken)
    {
        parent::__construct($authToken);

        $this->subUrl = 'Contacts';
    }
}
