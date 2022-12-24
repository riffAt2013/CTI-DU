<?php

function getOwnYoutubeIdForEmbed($urlId)
{
    $links=$urlId;
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $links, $match);
    $youtubeId = $match[1];
    return $youtubeId;
}
?>
