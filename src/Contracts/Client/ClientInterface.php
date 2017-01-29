<?php

namespace SalesOpz\Contracts\Client;

interface ClientInterface
{
    /**
     * Initiate a GET request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function get(string $url, array $input = [], $headers = null);

    /**
     * Initiate a POST request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function post(string $url, array $input = [], $headers = null);

    /**
     * Initiate a PUT request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function put(string $url, array $input = [], $headers = null);

    /**
     * Initiate a PATCH request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function patch(string $url, array $input = [], $headers = null);

    /**
     * Initiate a DELETE request.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function delete(string $url, array $input = [], $headers = null);

    /**
     * Handle sending the actual request specified by any of the above methods.
     *
     * @param  string      $url
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function send(string $url, array $input = [], $headers = null);

    /**
     * Parse the API response into a usable object or array.
     *
     * @param  mixed         $response
     * @return array|object  $response
     */
    public function parse($response);

    /**
     * Return the HTTP status code of the response.
     *
     * @return int  $code
     */
    public function getCode();

    /**
     * Return the parsed response.
     *
     * @return array  $response
     */
    public function getResponse();
}
