<?php

namespace App\UseCases\DailyRecord;

use Carbon\Carbon;
use App\Models\Record;

class FetchDailyRecord
{
    /**
     * 直近7日間の日ごとの総学習時間を取得する
     *
     * @param int $user_id
     * @return mixed
     */
    public function __invoke($user_id)
    {
        $daily_record = Record::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, DAY(created_at) as day, SUM(minute) as total_time')
            ->where('user_id', $user_id)
            ->where('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy('year', 'month', 'day')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->orderBy('day', 'asc')
            ->get();

        return $daily_record;
    }
}
