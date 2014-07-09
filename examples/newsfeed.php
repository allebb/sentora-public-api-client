<?php

require_once '../vendor/autoload.php';

/**
 * Example of returning latest project annoucements (with optional proxy server configuration)
 */

$news = new Ballen\Sentora\PublicApiClient\PublicApiClient();
$news->setResultLimit("333");

