<?php

namespace Ballen\Sentora\PublicApiClient\Endpoints;

use Ballen\Sentora\PublicApiClient\Wrappers\RequestWrapper;

class LatestVersion extends RequestWrapper implements EndpointInterface
{

    /**
     * The endpoint URL.
     */
    protected $endpoint_url = '/latestversion.json';

}
