<?php

namespace App\Core\Zoom;

use SalesOpz\Service\Zoom\ZoomParser;
use SalesOpz\Service\Zoom\ZoomAuthorizer;
use SalesOpz\Service\Zoom\AccountsAPI as ZoomAccountsAPI;
use App\Http\Controllers\Controller;

class ZoomController
{
    public function newSubscription()
    {
        // Authorize with the Zoom API
        $accountsApi = new ZoomAccountsAPI(
            new ZoomAuthorizer(['creds' => '']),
            new ZoomParser()
        );

        // Create a new sub account
        $response = $accountsApi->createSubAccount(['input' => []]);

        // Subscribe the sub account to a plan
        $response = $accountsApi->subscribePlan(['input' => []]);

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
