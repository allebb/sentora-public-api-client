<?php

namespace Ballen\Sentora\PublicApiClient\Wrappers;

class ResponseWrapper
{

    private $response;

    public function __construct(\GuzzleHttp\Message\Response $response)
    {
        $this->response = json_encode($response->json());
    }

    public function toArray()
    {
        return json_decode($this->response, true);
    }

    public function toJSON()
    {
        return json_decode($this->response);
    }

    public function toString()
    {
        return $this->response;
    }

    public function __toString()
    {
        return $this->toString();
    }

}
