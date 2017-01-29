<?php

namespace SalesOpz\Client;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Client as Guzzle;
use Contracts\Service\ServiceParser;
use Contracts\Service\ServiceAuthorizer;

class Client implements ServiceInterface
{
    /**
     * Client object that is responsible for making our requests.
     *
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
    * Grant provided by the ServiceAuthorizer to be used for
    * subsequent requests to the ServiceInterface.
    *
    * @var mixed
    */
    protected $grant;

    /**
    * Class responsible for interpreting response data and
    * transforming it into a useful array.
    *
    * @var Contracts\Service\ServiceParser
    */
    protected $parser;

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


    public function __construct(ServiceAuthorizer $auth, ServiceParser $parser)
    {
        $this->client = new Guzzle();

        $this->grant = $auth;

        $this->parser = $parser;
    }

    /**
     * Initiate a GET request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function get(string $url, array $input = [], $headers = null)
    {
        $method = 'GET';

        return $this->parse($this->send($method, $url, $input, $headers));
    }

    /**
     * Initiate a POST request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function post(string $url, array $input = [], $headers = null)
    {
        $method = 'POST';

        return $this->parse($this->send($method, $url, $input, $headers));
    }

    /**
     * Initiate a PUT request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function put(string $url, array $input = [], $headers = null)
    {
        $method = 'PUT';

        return $this->parse($this->send($method, $url, $input, $headers));
    }

    /**
     * Initiate a PATCH request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function patch(string $url, array $input = [], $headers = null)
    {
        $method = 'PATCH';

        return $this->parse($this->send($method, $url, $input, $headers));
    }

    /**
     * Initiate a DELETE request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function delete(string $url, array $input = [], $headers = null)
    {
        $method = 'DELETE';

        return $this->parse($this->send($method, $url, $input, $headers));
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
    public function send(string $method, string $url, array $input = [], $headers = null)
    {
        $payload = [];

        if ($this->method == 'POST') {
            $payload['multipart'] = [];

            foreach ($input as $key => $value) {
                array_push($payload['multipart'], [
                    'name'     => $key,
                    'contents' => $value
                ]);
            }
        } else {
            if ($this->method == 'GET') {
                $dataWrapper = 'query';
            } else {
                $dataWrapper = 'form_params';
            }
        }

        $payload['headers'] = $headers;

        $payload['http_errors'] = $this->httpErrors;

        $response = $this->client->request($this->method, $url, $payload);

        $this->code     = $response->getStatusCode();
        $this->response = $this->parse(json_decode($response->getBody(), true));

        return $this->response;
    }

    /**
     * Parse the API response into a usable object or array
     *
     * @param  mixed         $response
     * @return array|object  $response
     */
    public function parse($response)
    {
        return $this->parser->parse($response);
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
     * Return the parsed response.
     *
     * @return array  $response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
