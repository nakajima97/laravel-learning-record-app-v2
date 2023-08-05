<?php

namespace App\UseCases\Record;

use App\Models\Record;
use Carbon\Carbon;

class CalculateTotalStudyTimeThisMonth
{
    /**
     * @return mixed
     */
    public function __invoke($user_id)
    {
        $now = Carbon::now();

        $records = Record::whereYear('created_at', $now->format('Y'))
          ->whereMonth('created_at', $now->format('m'))
          ->where('user_id', $user_id)
          ->get();

        $time = $records->sum('minute');

        return $time;
    }
}
