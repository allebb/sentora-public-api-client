<?php

namespace Ballen\Sentora\PublicApiClient;

class PublicApiClient extends Wrappers\ClientWrapper
{

    /**
     * The base URL of the Sentora Public API.
     */
    const API_URL = 'http://api.sentora.io';

    /**
     * Stores an optional limit of results to return.
     */
    private $result_limit = 0;

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

}
