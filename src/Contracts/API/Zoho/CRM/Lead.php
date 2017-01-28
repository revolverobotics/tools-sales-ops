<?php

namespace SalesOpz\Contracts\API\Zoho\CRM;

interface Lead
{
    public function get($authToken, $scope, ...$options);
}
