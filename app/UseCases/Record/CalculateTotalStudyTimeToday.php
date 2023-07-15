<?php

namespace App\UseCases\Record;

use App\Models\Record;
use Carbon\Carbon;

class CalculateTotalStudyTimeToday
{
    public function __invoke()
    {
        $today = Carbon::today();

        $records = Record::whereDate('created_at', $today)->get();

        $time = $records->sum('minute');

        return $time;
    }
}
