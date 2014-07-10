<?php

require_once '../vendor/autoload.php';

/**
 * Example of returning the web servers current 
 */
$version = new Ballen\Sentora\PublicApiClient\PublicApiClient();

echo "The latest version is currently available is: ". $version->getVersion()->version;

