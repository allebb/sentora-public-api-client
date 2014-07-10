<?php

require_once '../vendor/autoload.php';

/**
 * Example of returning latest project annoucements.
 */
$news = new Ballen\Sentora\PublicApiClient\PublicApiClient();
$articles = $news->getNews();
echo "<ul>";
foreach ($articles as $newsitem) {
    echo "<li><a href=\"http://forums.sentora.io/showthread.php?tid=$newsitem->id.php\">$newsitem->title</a> posted by $newsitem->author</li>";
}
echo "</ul>";

