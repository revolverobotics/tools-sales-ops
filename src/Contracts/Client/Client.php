<?php

namespace SalesOpz\Contracts\Client;

interface Client
{
    /**
     * Initiate a GET request.
     * @param  array|null  $content
     * @param  array|null  $headers
     * @return mixed
     */
    public function get($content = null, $headers = null);

    /**
     * Initiate a POST request.
     * @param  array|null  $content
     * @param  array|null  $headers
     * @return mixed
     */
    public function post($content = null, $headers = null);

    /**
     * Initiate a PUT request.
     * @param  array|null  $content
     * @param  array|null  $headers
     * @return mixed
     */
    public function put($content = null, $headers = null);

    /**
     * Initiate a PATCH request.
     * @param  array|null  $content
     * @param  array|null  $headers
     * @return mixed
     */
    public function patch($content = null, $headers = null);

    /**
     * Initiate a DELETE request.
     * @param  array|null  $content
     * @param  array|null  $headers
     * @return mixed
     */
    public function delete($content = null, $headers = null);
}
