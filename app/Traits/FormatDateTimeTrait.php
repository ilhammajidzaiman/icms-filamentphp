<?php

namespace App\Traits;

use Carbon\Carbon;

trait FormatDateTimeTrait
{
    public function formatDayDate($data)
    {
        return Carbon::parse($data)->translatedFormat('l, j F Y');
    }

    public function formatDayDateTime($data)
    {
        return Carbon::parse($data)->translatedFormat('l, j F Y, H:i');
    }
}
