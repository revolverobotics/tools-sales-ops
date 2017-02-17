<?php

namespace Revolve\SalesOpz\Service\Zoom;

use Revolve\SalesOpz\Client\Client;
use Revolve\SalesOpz\Contracts\Service\Zoom\AccountInterface;

class Accounts extends Client implements AccountInterface
{
    /**
     * Authentication data used for accessing the API.
     *
     * @var string
     */
    protected $credentials;

    /**
     * The base Zoom API url.
     *
     * @var string
     */
    protected $baseUrl = 'https://api.zoom.us/v1/ma/';

    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * Create a sub account.
     *
     * @param  array  $input
     * @return array  JsonResponse {id, owner_id, owner_email, created_at}
     */
    public function createSubAccount($input)
    {
        $url = $this->baseUrl.'account/create';

        return $this->post($url, $input, [], NO_THROW);
    }

    /**
     * Update a sub account.
     *
     * @param  array  $input [accountId, options...]
     *                       See Zoom documentation for all other available parameters
     * @return array  JsonResponse {id, updated_at}
     */
    public function updateSubAccount($input)
    {
        $url = $this->baseUrl.'account/update';

        return $this->post($url, $input, [], NO_THROW);
    }

    /**
     * Delete a sub account.
     *
     * @param  array  $input [accountId]
     * @return array  JsonResponse {id, deleted_at}
     */
    public function deleteSubAccount($input)
    {
        $url = $this->baseUrl.'account/delete';

        return $this->post($url, $input, [], NO_THROW);
    }

    /**
     * List all the sub accounts under the master account.
     *
     * @return array  JsonResponse {page_count, page_number, page_size, total_records, subAccounts: {id, owner_email, created_at}}
     */
    public function listSubAccount()
    {
        $url = $this->baseUrl.'account/list';

        return $this->post($url, [], [], NO_THROW);
    }

    /**
     * Get a sub account.
     *
     * @param  array  $input [accountId]
     * @return array  JsonResponse {id, owner_id, owner_email, created_at}
     */
    public function getSubAccount($input)
    {
        $url = $this->baseUrl.'account/get';

        return $this->post($url, $input, [], NO_THROW);
    }

    /**
     * Subscribe a plan for a sub account. Only works for free sub accounts,
     * to be paid for by the master account (No existing plans).
     *
     * @param  array  $input [email, firstName, lastName, phoneNumber, address, city, country, state, zip, planBase]
     *                       See Zoom documentation for all other available parameters
     * @return JsonResponse     {...} See Zoom documentation for more details
     */
    public function subscribePlan($input)
    {
        $url = $this->baseUrl.'account/plan/subscribe';

        return $this->post($url, $input, [], NO_THROW);
    }

    /**
     * Add a plan to a sub account. Only works for sub accounts that already
     * have existing plans and are paid for by the master account.
     *
     * @param  array  $input [accountId, plan]
     */
    public function addPlan($input)
    {
        $url = $this->baseUrl.'account/plan/add';

        return $this->post($url, $input, [], NO_THROW);
    }

    /**
     * Update a plan for a paid sub account.
     *
     * @param  array  $input [accountId, type, plan]
     * @return JsonResponse       {id, updated_at}
     */
    public function updatePlan($input)
    {
        $url = $this->baseUrl.'account/plan/update';

        return $this->post($url, $input, [], NO_THROW);
    }

    /**
     * Get plan information for a sub account.
     *
     * @param  array  $input [accountId]
     * @return JsonResponse       {...} See Zoom documentation for more details
     */
    public function getPlan($input)
    {
        $url = $this->baseUrl.'account/plan/get';

        return $this->post($url, $input, [], NO_THROW);
    }

    /**
     * Update the billing information for a sub account.
     *
     * @param  array  $input [accountId, options...]
     *                       See Zoom documentation for all available parameters
     * @return JsonResponse      {id, updated_at}
     */
    public function updateBilling($input)
    {
        $url = $this->baseUrl.'account/billing/update';

        return $this->post($url, $input, [], NO_THROW);
    }

    /**
     * Adds our API Key & Secret to the payload. Also insures our response
     * comes back as JSON.
     *
     * @param  array  $input  The input data for the request
     * @return array  $input  The input data for the request with API Key & Secret added
     */
    protected function injectAuth($input)
    {
        $input['api_key']    = $this->credentials['api_key'];
        $input['api_secret'] = $this->credentials['api_secret'];
        $input['data_type']  = 'JSON';

        return $input;
    }
}
