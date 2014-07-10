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

}
