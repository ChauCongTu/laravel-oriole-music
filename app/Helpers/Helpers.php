<?php
namespace App\Helpers;

class Helpers
{
    public static function GetIDYoutube(string $youtubeUrl): string
    {
        if (strpos($youtubeUrl, 'youtube.com/watch?v=') === false) {
            return 'u25xbCQjnma';
        }

        $parts = explode('=', $youtubeUrl);
        $videoId = explode('&', $parts[1])[0];
        return $videoId;
    }
}
