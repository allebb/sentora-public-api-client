<?php

namespace Ballen\Sentora\PublicApiClient\Wrappers;

use GuzzleHttp\Client;

abstract class ClientWrapper
{

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
        $this->apiclient = new Client($this->config);
    }

    /**
     * Returns the initiated instance.
     * @return GuzzleHttp\Client
     */
    public function instance()
    {
        return $this->apiclient;
    }

}
