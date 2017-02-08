<?php

namespace Revolve\SalesOpz\Client;

use GuzzleHttp\Client as Guzzle;
use Revolve\SalesOpz\Contracts\Client\ClientInterface;

class Client implements ClientInterface
{
    /**
     * If passed to a request method, Guzzle will not throw an exception on HTTP errors.
     *
     * @var integer
     */
    const THROW = 0b0001;

    /**
     * Object that is responsible for making our requests.
     *
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * Status code of the response from the backend microservice.
     *
     * @var int
     */
    protected $code;

    /**
    * Response from the backend microservice.  Will always be JSON.
    *
    * @var array
    */
    protected $response;

    /**
     * Whether or not to throw an exception if an error code was returned
     *
     * @var boolean
     */
    public $httpErrors = true;


    public function __construct()
    {
        $this->client = new Guzzle();
    }

    /**
     * Initiate a GET request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function get(string $url, array $input = [], $headers = null, $throw = 0)
    {
        $method = 'GET';

        return $this->send($method, $url, $input, $headers, $throw);
    }

    /**
     * Initiate a POST request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function post(string $url, array $input = [], $headers = null, $throw = 0)
    {
        $method = 'POST';

        return $this->send($method, $url, $input, $headers, $throw);
    }

    /**
     * Initiate a PUT request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function put(string $url, array $input = [], $headers = null, $throw = 0)
    {
        $method = 'PUT';

        return $this->send($method, $url, $input, $headers, $throw);
    }

    /**
     * Initiate a PATCH request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function patch(string $url, array $input = [], $headers = null, $throw = 0)
    {
        $method = 'PATCH';

        return $this->send($method, $url, $input, $headers, $throw);
    }

    /**
     * Initiate a DELETE request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function delete(string $url, array $input = [], $headers = null, $throw = 0)
    {
        $method = 'DELETE';

        return $this->send($method, $url, $input, $headers, $throw);
    }

    /**
     * Handle sending the actual request specified by any of the above methods.
     *
     * @param  string      $method
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function send(string $method, string $url, array $input = [], $headers = null, $throw = 0)
    {
        $input = $this->injectAuth($input);

        $payload = [];

        if ($method == 'POST') {
            $payload['multipart'] = [];

            foreach ($input as $key => $value) {
                array_push($payload['multipart'], [
                    'name'     => $key,
                    'contents' => $value
                ]);
            }
        } else {
            if ($method == 'GET') {
                $dataWrapper = 'query';
            } else {
                $dataWrapper = 'form_params';
            }

            $payload[$dataWrapper] = $input;
        }

        $payload['headers'] = $headers;

        $payload['http_errors'] = $throw;

        $response = $this->client->request($method, $url, $payload);

        $this->code     = $response->getStatusCode();
        $this->response = $response->getBody();

        return $this->response;
    }

    /**
     * Allows any auth or other data to be injected into each request. Should be
     * overridden by any child class needing to use this method.
     *
     * @param  array  $input  The input data for the request
     * @return array  $input  The input data for the request
     */
    protected function injectAuth($input)
    {
        return $input;
    }

    /**
     * Return the HTTP status code of the response.
     *
     * @return int  $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Return the response body.
     *
     * @return array  $response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
