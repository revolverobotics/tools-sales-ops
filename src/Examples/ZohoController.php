<?php

namespace App\Core\Zoho;

use Dotenv\Dotenv;
use Revolve\SalesOpz\Service\Zoho\Inventory\API as InventoryAPI;
use App\Http\Controllers\Controller;

class ZohoController
{
    public function newSubscription()
    {
        $zoomApi = new ZohoAPI([
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

    public function example()
    {
        $zI = new InventoryAPI([
            'organization_id' => '',
            'authtoken' => env('ZOHO_INVENTORY_AUTH_TOKEN')
        ]);

        $response = $zI->doSomething();
    }

    public function otherExample()
    {
        $zohoApi = new ZohoAPI();

        $response = $zohoApi->inventory->items->doSomething();
    }
}
