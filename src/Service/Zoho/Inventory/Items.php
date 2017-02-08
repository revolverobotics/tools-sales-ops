<?php

namespace Revolve\SalesOpz\Service\Zoho\Inventory;

use Revolve\SalesOpz\Client\Client;

class Items extends Client
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
    protected $baseUrl = 'https://inventory.zoho.com/api/v1/items/';

    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    public function listAll(array $input = [])
    {
        return $this->get($this->baseUrl, $this->inputAsJson($input), [], NO_THROW);
    }

    public function create()
    {
        //
    }

    public function update()
    {
        //
    }

    public function markActive()
    {
        //
    }

    public function markInactive()
    {
        //
    }

    public function delete()
    {
        //
    }

    public function deleteImage()
    {
        //
    }

    protected function inputAsJson($input)
    {
        return ['JSONString' => json_encode($input)];
    }

    /**
     * Adds our Auth token and Organization ID to the payload.
     *
     * @param  array  $input  The input data for the request
     * @return array  $input  The input data for the request with API Key & Secret added
     */
    protected function injectAuth($input)
    {
        $input['authtoken']    = $this->credentials['authtoken'];
        $input['organization_id'] = $this->credentials['organization_id'];

        return $input;
    }
}
