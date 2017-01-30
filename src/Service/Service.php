<?php

namespace SalesOpz\Service\Zoom;

use SalesOpz\Client\Client;
use SalesOpz\Contracts\Service\ServiceParser;
use SalesOpz\Contracts\Service\ServiceAuthorizer;
use SalesOpz\Contracts\Service\ServiceInterface;

class Service implements ServiceInterface
{
    /**
     * Grant provided by the ServiceAuthorizer to be used for
     * subsequent requests to the ServiceInterface.
     *
     * @var mixed
     */
    protected $grant;

    public function __construct(ServiceAuthorizer $auth, ServiceParser $parser)
    {
        $this->client = new Client();

        $this->grant = $auth;

        $this->parser = $parser;
    }

    /**
     * Authorizes the client with a service using the given credentials.
     *
     * @param  mixed  $credentials
     * @return mixed  $grant
     */
    public function authorize($credentials)
    {
        $this->grant = $this->authorizer->authorize($credentials);
    }

    /**
     * Perform any necessary parsing functions to make our response data usable.
     *
     * @param  mixed  $response
     * @return array  $response
     */
    public function parse($response)
    {
        return $this->parser->parse($response);
    }
}
