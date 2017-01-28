<?php

namespace SalesOpz\Contracts\Service\Zoho\CRM;

interface Lead
{
    public function get($authToken, $scope, ...$options);
}
