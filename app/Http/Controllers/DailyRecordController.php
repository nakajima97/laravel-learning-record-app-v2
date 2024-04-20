<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\DailyRecord\FetchDailyRecord;

class DailyRecordController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $fetch_daily_record = new FetchDailyRecord();
        $daily_records = $fetch_daily_record(1);

        return view('record_daily.index', ['daily_records' => $daily_records]);
    }
}
