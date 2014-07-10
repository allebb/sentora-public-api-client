<?php

namespace Ballen\Sentora\PublicApiClient;

class PublicApiClient extends Wrappers\RequestWrapper
{

    const ENDPOINT_NAMESPACE = 'Ballen\Sentora\PublicApiClient\Endpoints';

    /**
     * Stores an optional limit of results to return.
     */
    private $result_limit = 0;

    /**
     * Enpoint object storage.
     */
    private $endpoint;

    /**
     * Constructor!
     * @param array $config Optional Guzzle configuration (eg. Proxy settings etc.)
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * Sets an optional result limit where applicable.
     * @param int $limit Number of results to return (where applicable), default is '0' (unlimited).
     * @return \Ballen\Sentora\PublicAPIClient\PublicApiClient
     * @throws Ballen\Sentora\PublicAPIClient\Exceptions\InvalidDataTypeException
     */
    public function setResultLimit($limit = 0)
    {
        if (is_int($limit)) {
            $this->result_limit = $limit;
        } else {
            throw new Exceptions\InvalidDataTypeException('The specified limit requires an integer value.');
        }
        return $this;
    }

    /**
     * Returns the current result limit.
     * @return int
     */
    public function getResultLimit()
    {
        return $this->result_limit;
    }

    /**
     * Get latest project news.
     * @return Ballen\Sentora\PublicApiClient\Wrappers\ResponseWrapper
     */
    public function getNews()
    {
        return $this->getWebservice('LatestNews')->toJSON();
    }

    /**
     * Gets the latest stable version of the Sentora software.
     * @return Ballen\Sentora\PublicApiClient\Wrappers\ResponseWrapper
     */
    public function getVersion()
    {
        return getWebservice('LatestVersion')->toJSON();
    }

    /**
     * Gets the public IP address of the current server.
     * @return Ballen\Sentora\PublicApiClient\Wrappers\ResponseWrapper
     */
    public function getPublicIP()
    {
        return getWebservice('PublicIpAddress')->toJSON();
    }

    /**
     * Initates an endpoint request.
     * @param string $endpoint
     * @return Ballen\Sentora\PublicApiClient\Wrappers\ResponseWrapper
     * @throws EndpointNotFoundException
     */
    private function getWebservice($endpoint = '')
    {
        if (class_exists(self::ENDPOINT_NAMESPACE . '\\' . $endpoint)) {
            $this->endpoint = self::ENDPOINT_NAMESPACE . '\\' . $endpoint;
            $request = (new $this->endpoint)->request();
            return $request->response();
        } else {
            throw new \Ballen\Sentora\PublicApiClient\Exceptions('The requested endpoint (' . $endpoint . ') was not found!');
        }
    }

}
