<?php

namespace Ballen\Sentora\PublicApiClient\Endpoints;

interface EndpointInterface
{

    /**
     * Responseibily for making the request  and storing the result (limits the amount of external request that need to be made.)
     *      */
    public function request();

    /**
     * Must provide a ReponseWrapper object.
     */
    public function response();
}
