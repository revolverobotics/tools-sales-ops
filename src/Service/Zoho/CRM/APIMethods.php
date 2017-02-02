<?php

namespace SalesOpz\Service\Zoho\CRM;

use SalesOpz\Client\Client;
use SalesOpz\Contracts\Service\Zoho\CRM\CRMInterface;

class APIMethods implements CRMInterface
{
    /**
     * If passed as an option, newFormat == 2. Otherwise, newFormat == 1.
     *
     * @var integer
     */
    const NEW_FORMAT = 0b0001;

    /**
     * If passed as an option, version == 2.
     *
     * @var integer
     */
    const VERSION_2 = 0b0010;

    /**
     * If passed as an option, version == 4.
     *
     * @var integer
     */
    const VERSION_4 = 0b0100;

    /**
     * The base URL of the Zoho CRM API.
     *
     * @var string
     */
    protected $baseUrl = 'https://crm.zoho.com/crm/private/json/';

    /**
     * The URL sub-'folder' of the particular CRM module
     *
     * @var string
     */
    protected $subUrl;

    /**
     * The authorization token.
     *
     * @var string
     */
    protected $authToken;

    /**
     * The scope.
     *
     * @var string
     */
    protected $scope = 'crmapi';

    /**
     * The Auth Token & Scope array appended to every requests' input.
     *
     * @var array
     */
    protected $aTS = [];

    /**
     * The Client used to make requests to the API.
     *
     * @var Client
     */
    protected $client;

    public function __construct($authToken)
    {
        $this->client = new Client();

        $this->authToken = $authToken;

        $this->aTS = [
            'authtoken' => $this->authToken,
            'scope'     => $this->scope,
            'wfTrigger' => true // Always trigger workflows from API calls
        ];
    }

    /**
     * Get data associated with the owner of the Authentication Token.
     *
     *
     * @return JsonResponse
     */
    public function getMyRecords(array $filters, $options = null)
    {
        if ($options & NEW_FORMAT) {
            $newFormat = 2;
        } else {
            $newFormat = 1;
        }

        if ($options & VERSION_2) {
            $version = 2;
        } elseif ($options & VERSION_4) {
            $version = 4;
        } else {
            $version = 1;
        }

        $this->client->get($this->baseUrl.$this->subUrl.'/getMyRecords', [
            'newFormat' => $newFormat,
            'version'   => $version
        ] + $filters + $this->aTS);
    }

    /**
     * Get all the users' data.
     *
     * @return
     */
    public function getRecords(array $options)
    {
        $this->client->get($this->baseUrl.$this->subUrl.'/getRecords', $options + $this->aTS);
    }

    /**
     * Get individual records by record ID.
     *
     * @return
     */
    public function getRecordById(array $options)
    {
        $this->client->get($this->baseUrl.$this->subUrl.'/getRecordById', $options + $this->aTS);
    }

    /**
     * Get a list of IDs of deleted records.
     *
     * @return
     */
    public function getDeletedRecordIds(array $options)
    {
        $this->client->get($this->baseUrl.$this->subUrl.'/getDeletedRecordIds', $options + $this->aTS);
    }

    /**
     * Insert records into the Zoho CRM.
     *
     * @return
     */
    public function insertRecords($data)
    {
        $payload = $this->convertToXML($data);

        $this->client->post($this->baseUrl.$this->subUrl.'/insertRecords', [
            'xmlData' => $payload
        ] + $this->aTS);
    }

    /**
     * Update records in the Zoho CRM.
     *
     * @return
     */
    public function updateRecords($id, $data, $options = null)
    {
        $payload = $this->convertToXML($data);

        if ($options & NEW_FORMAT) {
            $newFormat = 2;
        } else {
            $newFormat = 1;
        }

        if ($options & VERSION_2) {
            $version = 2;
        } elseif ($options & VERSION_4) {
            $version = 4;
        } else {
            $version = 1;
        }

        $this->client->post($this->baseUrl.$this->subUrl.'/updateRecords', [
            'id'        => $id,
            'xmlData'   => $payload,
            'newFormat' => $newFormat,
            'version'   => $version
        ] + $this->aTS);
    }

    /**
     * Search records by value in a pre-defined column.
     *
     * @return
     */
    public function getSearchRecordsByPDC($options)
    {
        $this->client->get($this->baseUrl.$this->subUrl.'/getSearchRecordsByPDC', $options + $this->aTS);
    }

    /**
     * Delete records.
     *
     * @return
     */
    public function deleteRecords()
    {
        //
    }

    /**
     * Convert a lead into a potential, account, and/or contact.
     *
     * @return
     */
    public function convertLead()
    {
        //
    }

    /**
     * Get records related to a module.
     *
     * @return
     */
    public function getRelatedRecords()
    {
        //
    }

    /**
     * Get the fields available in a module.
     *
     * @return
     */
    public function getFields()
    {
        //
    }

    /**
     * Update records related to another record.
     *
     * @return
     */
    public function updateRelatedRecords()
    {
        //
    }

    /**
     * Get a list of users in your organization.
     *
     * @return
     */
    public function getUsers()
    {
        //
    }

    /**
     * Attach a file to a record.
     *
     * @return
     */
    public function uploadFile()
    {
        //
    }

    /**
     * Disassociate the relationship between parent and child records.
     *
     * @return
     */
    public function delink()
    {
        //
    }

    /**
     * Download a file attached to a record.
     *
     * @return
     */
    public function downloadFile()
    {
        //
    }

    /**
     * Delete a file attached to a record.
     *
     * @return
     */
    public function deleteFile()
    {
        //
    }

    /**
     * Add a photo to a contact or lead.
     *
     * @return
     */
    public function uploadPhoto()
    {
        //
    }

    /**
     * Download the photo of a contact or lead.
     *
     * @return
     */
    public function downloadPhoto()
    {
        //
    }

    /**
     * Delete a photo of a contact or lead.
     *
     * @return
     */
    public function deletePhoto()
    {
        //
    }

    /**
     * Get a list of all modules in the CRM.
     *
     * @return
     */
    public function getModules()
    {
        //
    }

    /**
     * Search records.
     *
     * @return
     */
    public function searchRecords()
    {
        //
    }
}
