<?php

namespace App\Core\Zoom;

use Illuminate\Http\Request;
use SalesOpz\Client\Client;
use SalesOpz\Service\Zoom\Authorizer;
use SalesOpz\Service\Zoom\AccountsAPI;
use App\Http\Controllers\Controller;

class ZoomController
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client(new AccountsAPI);

        $this->client->service->auth->check(['creds' => []]);


// TODO: This is too messy...
// AccountsAPI should extend Client
// Client should implements Request & Response
// 
// We want:
// $this->api = new AccountsAPI;
// $this->api->authorize(['credentials' => []]);
    }

    public function newSubscription (Request $r)
    {
        $api = $this->client->service;

        $api->createSubAccount();

        $api->
    }
}
