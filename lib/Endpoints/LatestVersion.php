<?php

namespace Ballen\Sentora\PublicApiClient\Endpoints;

use Ballen\Sentora\PublicApiClient\Wrappers\RequestWrapper;
use Ballen\Sentora\PublicApiClient\Wrappers\ResponseWrapper;

class LatestVersion extends RequestWrapper implements EndpointInterface
{

    /**
     * The endpoint URL.
     */
    const ENDPOINT_URL = '/latestversion.json';

    /**
     * Object storage for the response data.
     * @var string
     */
    protected $response;

    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    /**
     * Make the web service API request and store the respone.
     * @return \Ballen\Sentora\PublicApiClient\Endpoints\LatestNews
     */
    public function request()
    {
        $request = $this->instance()->get(self::API_URL . self::ENDPOINT_URL);
        $this->response = $request;
        return $this;
    }

    /**
     * Return a repsonse object containing various response formats (text, json, array etc.)
     * @return \Ballen\Sentora\PublicApiClient\Wrappers\ResponseWrapper
     */
    public function response()
    {
        return new ResponseWrapper($this->response);
    }

}
