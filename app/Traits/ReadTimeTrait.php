<?php

namespace App\Traits;

trait ReadTimeTrait
{
    public function readTime($content)
    {
        $wordsPerMinute = 200;
        $wordCount = str_word_count(strip_tags($content));
        $readingTimeMinutes = $wordCount / $wordsPerMinute;
        return $readingTimeMinutes;
    }

    public function readTimeFormatted($content)
    {
        $wordsPerMinute = 200;
        $exactTime = $this->readTime($content, $wordsPerMinute);
        $minutes = floor($exactTime);
        $seconds = round(($exactTime - $minutes) * 60);
        if ($minutes > 0 && $seconds > 0) :
            return "{$minutes} menit {$seconds} detik";
        elseif ($minutes > 0) :
            return "{$minutes} menit";
        else :
            return "{$seconds} detik";
        endif;
    }
}
