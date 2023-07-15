<?php

namespace App\UseCases\Record;

use App\Models\Record;
use Carbon\Carbon;

class SelectTodayRecord
{
    /**
     * @return mixed
     */
    public function __invoke()
    {
        $today = Carbon::today();

        return Record::whereDate('created_at', $today)->get();
    }
}
