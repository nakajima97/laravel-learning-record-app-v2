<?php

namespace App\UseCases\Record;

use App\Models\Record;

class StoreRecord
{
    /**
     * @params \App\Models\Record $record
     * @return boolean
     */
    public function __invoke(Record $record)
    {
        $result = $record->save();

        return $result;
    }
}
