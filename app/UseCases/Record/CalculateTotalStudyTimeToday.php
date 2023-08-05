<?php

namespace App\UseCases\Record;

use App\Models\Record;
use Carbon\Carbon;

class CalculateTotalStudyTimeToday
{
    /**
     * @param int|string|null $user_id
     * @return mixed
     */
    public function __invoke($user_id)
    {
        $today = Carbon::today();

        $records = Record::whereDate('created_at', $today)
            ->where('user_id', $user_id)
            ->get();

        $time = $records->sum('minute');

        return $time;
    }
}
