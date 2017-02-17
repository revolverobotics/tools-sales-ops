<?php

namespace Revolve\SalesOpz\Contracts\Service\Zoom;

use Revolve\SalesOpz\Contracts\Service\ServiceInterface;

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
     * @param  array  $input
     * @return array  JsonResponse {id, owner_id, owner_email, created_at}
     */
    public function createSubAccount(array $input);

    /**
     * Update a sub account.
     *
     * @param  array  $input
     * @return array  JsonResponse {id, updated_at}
     */
    public function updateSubAccount(array $input);

    /**
     * Delete a sub account.
     *
     * @param  array  $input
     * @return array  JsonResponse {id, deleted_at}
     */
    public function deleteSubAccount(array $input);

    /**
     * List all the sub accounts under the master account.
     *
     * @return array  JsonResponse {page_count, page_number, page_size, total_records, subAccounts: {id, owner_email, created_at}}
     */
    public function listSubAccount();

    /**
     * Get a sub account.
     *
     * @param  array  $input
     * @return array  JsonResponse {id, owner_id, owner_email, created_at}
     */
    public function getSubAccount(array $input);

    /**
     * Subscribe a plan for a sub account. Only works for free sub accounts,
     * to be paid for by the master account (No existing plans).
     *
     * @param  array  $input
     * @return JsonResponse     {...} See Zoom documentation for more details
     */
    public function subscribePlan(array $input);

    /**
     * Add a plan to a sub account. Only works for sub accounts that already
     * have existing plans and are paid for by the master account.
     *
     * @param  array  $input
     * @return JsonResponse     {...} See Zoom documentation for more details
     */
    public function addPlan(array $input);

    /**
     * Update a plan for a paid sub account.
     *
     * @param  array  $input
     * @return JsonResponse       {id, updated_at}
     */
    public function updatePlan(array $input);

    /**
     * Get plan information for a sub account.
     *
     * @param  array  $input
     * @return JsonResponse       {...} See Zoom documentation for more details
     */
    public function getPlan(array $input);

    /**
     * Update the billing information for a sub account.
     *
     * @param  array  $input
     * @return JsonResponse      {id, updated_at}
     */
    public function updateBilling(array $input);
}
