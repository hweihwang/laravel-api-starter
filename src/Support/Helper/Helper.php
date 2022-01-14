<?php

namespace Support\Helper;

use Carbon\Carbon;

class Helper
{
    public static function yearMonthDayHourMinute(Carbon $date): string
    {
        return $date->format('Y-m-d H:i');
    }
}
