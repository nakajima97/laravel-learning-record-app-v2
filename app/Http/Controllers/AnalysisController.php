<?php

namespace App\Http\Controllers;

use App\UseCases\DailyRecord\FetchDailyRecordForLast7Days;
use App\UseCases\MonthlyRecord\FetchMonthlyRecordPaginate;

class AnalysisController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $user_id = auth()->id();

        if ($user_id === null) {
            return redirect()->route('login');
        }

        $fetch_daily_record = new FetchDailyRecordForLast7Days();
        $daily_records = $fetch_daily_record($user_id);

        // 月ごとの総学習時間を取得する
        $fetch_record_monthly_paginate = new FetchMonthlyRecordPaginate();
        $monthly_records = $fetch_record_monthly_paginate($user_id);

        return view('analysis.index', ['daily_records' => $daily_records, 'monthly_records' => $monthly_records]);
    }
}
