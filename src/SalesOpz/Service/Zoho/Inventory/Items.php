<?php

namespace Revolve\SalesOpz\Service\Zoho\Inventory;

use Revolve\SalesOpz\Client\Client;
use Revolve\SalesOpz\Contracts\Service\Zoho\Inventory\ItemInterface;

class Items extends Client implements ItemInterface
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
        parent::__construct();

        $this->credentials = $credentials;
    }

    public function listAll()
    {
        $response =
            $this->get($this->baseUrl);

        return json_decode($response, true);
    }

    public function fetch(string $itemId)
    {
        $response =
            $this->get($this->baseUrl.$itemId);

        return json_decode($response, true);
    }

    public function create(array $input = [])
    {
        $response =
            $this->post($this->baseUrl, $this->inputAsJson($input));

        return json_decode($response, true);
    }

    public function update(string $itemId, array $input = [])
    {
        $response =
            $this->put($this->baseUrl.$itemId, $this->inputAsJson($input));

        return json_decode($response, true);
    }

    public function markActive(string $itemId)
    {
        $response =
            $this->post($this->baseUrl.$itemId.'/active');

        return json_decode($response, true);
    }

    public function markInactive(string $itemId)
    {
        $response =
            $this->post($this->baseUrl.$itemId.'/inactive');

        return json_decode($response, true);
    }

    public function trash(string $itemId)
    {
        $response =
            $this->delete($this->baseUrl.$itemId);

        return json_decode($response, true);
    }

    public function trashImage(string $itemId)
    {
        $response =
            $this->delete($this->baseUrl.$itemId.'/image');

        return json_decode($response, true);
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
        $input['authtoken']       = $this->credentials['authtoken'];
        $input['organization_id'] = $this->credentials['organization_id'];

        return $input;
    }
}
