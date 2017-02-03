<?php

namespace App\Core\Zoom;

use Dotenv\Dotenv;
use SalesOpz\Service\Zoom\ZoomParser;
use SalesOpz\Service\Zoom\ZoomAuthorizer;
use SalesOpz\Service\Zoom\AccountsAPI as ZoomAccountsAPI;
use App\Http\Controllers\Controller;

class ZoomController
{
    public function newSubscription()
    {
        $zoomApi = new ZoomAPI([
            'api_key'    => '',
            'api_secret' => ''
        ]);

        // Create a new sub account
        $response = $zoomApi->accounts->createSubAccount(['input' => []]);

        // Subscribe the sub account to a plan
        $response = $zoomApi->accounts->subscribePlan(['input' => []]);

        // Notify user with account details
        Mail::to('account-owner@email.com')->queue(new Mailable($response));
    }

    public function modifySubscription()
    {
        //
    }

    public function cancelSubscription()
    {
        //
    }
}
