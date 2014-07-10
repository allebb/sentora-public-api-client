<?php

namespace Ballen\Sentora\PublicApiClient\Wrappers;

use GuzzleHttp\Client as WebClient;

abstract class RequestWrapper
{

    /**
     * The base URL of the Sentora Public API.
     */
    const API_URL = 'http://api.sentora.io';

    /**
     * Guzzle HTTP object storage
     * @var GuzzleHttp\Client
     */
    protected $apiclient;

    /**
     * Custom Guzzle HTTP configuration.
     * @var array 
     */
    private $config = [];

    /**
     * Object storage for the response data.
     * @var string
     */
    protected $response;

    public function __construct($config = [])
    {
        if (!empty($config)) {
            $this->config = $config;
        }
        $this->apiclient = new WebClient($this->config);
    }

    /**
     * Returns the initiated instance.
     * @return GuzzleHttp\Client\Client
     */
    public function instance()
    {
        return $this->apiclient;
    }

    /**
     * Make the web service API request and store the respone.
     * @return \Ballen\Sentora\PublicApiClient\Endpoints\LatestNews
     */
    public function request()
    {
        $request = $this->instance()->get(self::API_URL . $this->endpoint_url);
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
