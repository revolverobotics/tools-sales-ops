<?php

namespace SalesOpz\Service\Zoho\CRM;

use SalesOpz\Service\Zoho\CRM\APIMethods;

class Potentials extends APIMethods
{
    public function __construct($authToken)
    {
        parent::__construct($authToken);

        $this->subUrl = 'Potentials';
    }
}
