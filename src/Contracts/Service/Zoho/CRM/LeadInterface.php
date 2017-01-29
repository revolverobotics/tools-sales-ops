<?php

namespace SalesOpz\Contracts\Service\Zoho\CRM;

interface LeadInterface
{
    public function get($authToken, $scope, ...$options);
}
