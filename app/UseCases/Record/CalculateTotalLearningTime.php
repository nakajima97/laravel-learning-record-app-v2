<?php

namespace App\UseCases\Record;

use App\Models\Record;

class CalculateTotalLearningTime
{
    /**
     * @param int|string|null $user_id
     * @return mixed
     */
    public function __invoke($user_id)
    {
        $record = Record::where('user_id', $user_id)->get();
        $time = $record->sum('minute');

        return $time;
    }
}
