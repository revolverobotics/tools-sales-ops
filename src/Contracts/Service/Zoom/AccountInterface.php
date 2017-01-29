<?php

namespace SalesOpz\Contracts\Service\Zoom;

use SalesOpz\Contracts\Service\ServiceInterface;

/**
 * Interacts with the Zoom Account API. Essential for managing sub accounts.
 *
 * Documentation: https://zoom.us/developer/overview/rest-account-api
 */
interface AccountInterace extends ServiceInterface
{
    /**
     * Create a sub account.
     *
     * @param  string $email
     * @param  string $firstName
     * @param  string $lastName
     * @param  string $password
     * @param  mixed  $options     [...] See Zoom documentation for all other available parameters
     * @return array  JsonResponse {id, owner_id, owner_email, created_at}
     */
    public function createSubAccount($email, $firstName, $lastName, $password, ...$options);

    /**
     * Update a sub account.
     *
     * @param  string $accountId
     * @param  mixed  $options     [...] See Zoom documentation for all other available parameters
     * @return array  JsonResponse {id, updated_at}
     */
    public function updateSubAccount($accountId, $options = null);

    /**
     * Delete a sub account.
     *
     * @param  string $accountId
     * @return array  JsonResponse {id, deleted_at}
     */
    public function deleteSubAccount($accountId);

    /**
     * List all the sub accounts under the master account.
     *
     * @return array  JsonResponse {page_count, page_number, page_size, total_records, subAccounts: {id, owner_email, created_at}}
     */
    public function listSubAccount();

    /**
     * Get a sub account.
     *
     * @param  string $accountId
     * @return array  JsonResponse {id, owner_id, owner_email, created_at}
     */
    public function getSubAccount($accountId);

    /**
     * Subscribe a plan for a sub account. Only works for free sub accounts,
     * to be paid for by the master account (No existing plans).
     *
     * @param  string $email
     * @param  string $firstName
     * @param  string $lastName
     * @param  string $phoneNumber
     * @param  string $address
     * @param  string $city
     * @param  string $country
     * @param  string $state
     * @param  string $zip
     * @param  string $planBase {type, hosts}
     *                          ['type'  => ['trial', 'monthly', 'yearly', 'business_monthly', 'business_yearly', 'edu20', 'zroom_monthly', 'zroom_yearly']]
     *                          ['hosts' => (int)]
     * @param  mixed  $options  [...] See Zoom documentation for all other available parameters
     * @return JsonResponse     {...} See Zoom documentation for more details
     */
    public function subscribePlan($email, $firstName, $lastName, $phoneNumber, $address, $city, $country, $state, $zip, $planBase, ...$options);

    /**
     * Add a plan to a sub account. Only works for sub accounts that already
     * have existing plans and are paid for by the master account.
     *
     * @param string $accountId
     * @param string $plan      {type, hosts} See Zoom documentation for more details
     */
    public function addPlan($accountId, $plan);

    /**
     * Update a plan for a paid sub account.
     *
     * @param  string  $accountId
     * @param  integer $type      1 means Base Plan, 2 means Additional Plan.
     * @param  string  $plan      [...] See Zoom documentation for all available plans
     * @return JsonResponse       {id, updated_at}
     */
    public function updatePlan($accountId, $type, $plan);

    /**
     * Get plan information for a sub account.
     *
     * @param  string  $accountId
     * @return JsonResponse       {...} See Zoom documentation for more details
     */
    public function getPlan($accountId);

    /**
     * Update the billing information for a sub account.
     *
     * @param  string $accountId
     * @param  mixed  $options   [...] See Zoom documentation for all available parameters
     * @return JsonResponse      {id, updated_at}
     */
    public function updateBilling($accountId, ...$options);
}
