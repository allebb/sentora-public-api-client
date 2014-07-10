<?php

namespace Ballen\Sentora\PublicApiClient\Endpoints;

use Ballen\Sentora\PublicApiClient\Wrappers\RequestWrapper;

class PublicIpAddress extends RequestWrapper implements EndpointInterface
{

    /**
     * The endpoint URL.
     */
    protected $endpoint_url = '/ip.json';

}
