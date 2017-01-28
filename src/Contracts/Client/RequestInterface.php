<?php

namespace SalesOpz\Contracts\Client;

interface RequestInterface
{
    /**
     * Initiate a GET request.
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function get($input = null, $headers = null);

    /**
     * Initiate a POST request.
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function post($input = null, $headers = null);

    /**
     * Initiate a PUT request.
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function put($input = null, $headers = null);

    /**
     * Initiate a PATCH request.
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function patch($input = null, $headers = null);

    /**
     * Initiate a DELETE request.
     * @param  array|null  $input
     * @param  array|null  $headers
     * @return mixed
     */
    public function delete($input = null, $headers = null);
}
