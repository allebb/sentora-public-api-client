<?php

require_once '../vendor/autoload.php';

/**
 * Example of returning the most recenty stable version.
 */
$version = new Ballen\Sentora\PublicApiClient\PublicApiClient();

echo "This web servers (public) IP address is ". $version->getPublicIP()->address;

