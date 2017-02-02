<?php

namespace SalesOpz\Contracts\Service\Zoho\CRM;

interface CRMInterface
{
    /**
     * Get data associated with the owner of the Authentication Token.
     *
     *
     * @return JsonResponse
     */
    public function getMyRecords();

    /**
     * Get all the users' data.
     *
     * @return
     */
    public function getRecords();

    /**
     * Get individual records by record ID.
     *
     * @return
     */
    public function getRecordById();

    /**
     * Get a list of IDs of deleted records.
     *
     * @return
     */
    public function getDeletedRecordIds();

    /**
     * Insert records into the Zoho CRM.
     *
     * @return
     */
    public function insertRecords();

    /**
     * Update records in the Zoho CRM.
     *
     * @return
     */
    public function updateRecords();

    /**
     * Search records by value in a pre-defined column.
     *
     * @return
     */
    public function getSearchRecordsByPDC();

    /**
     * Delete records.
     *
     * @return
     */
    public function deleteRecords();

    /**
     * Convert a lead into a potential, account, and/or contact.
     *
     * @return
     */
    public function convertLead();

    /**
     * Get records related to a module.
     *
     * @return
     */
    public function getRelatedRecords();

    /**
     * Get the fields available in a module.
     *
     * @return
     */
    public function getFields();

    /**
     * Update records related to another record.
     *
     * @return
     */
    public function updateRelatedRecords();

    /**
     * Get a list of users in your organization.
     *
     * @return
     */
    public function getUsers();

    /**
     * Attach a file to a record.
     *
     * @return
     */
    public function uploadFile();

    /**
     * Disassociate the relationship between parent and child records.
     *
     * @return
     */
    public function delink();

    /**
     * Download a file attached to a record.
     *
     * @return
     */
    public function downloadFile();

    /**
     * Delete a file attached to a record.
     *
     * @return
     */
    public function deleteFile();

    /**
     * Add a photo to a contact or lead.
     *
     * @return
     */
    public function uploadPhoto();

    /**
     * Download the photo of a contact or lead.
     *
     * @return
     */
    public function downloadPhoto();

    /**
     * Delete a photo of a contact or lead.
     *
     * @return
     */
    public function deletePhoto();

    /**
     * Get a list of all modules in the CRM.
     *
     * @return
     */
    public function getModules();

    /**
     * Search records.
     *
     * @return
     */
    public function searchRecords();
}
