<?php

namespace App\Http\Controllers;

use App\UseCases\DailyRecord\FetchDailyRecordForLast7Days;
use App\UseCases\MonthlyRecord\FetchMonthlyRecordPaginate;
use App\UseCases\Record\CalculateTotalLearningTime;

class AnalysisController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $auth_id = auth()->id();

        if ($auth_id === null) {
            return redirect()->route('login');
        }

        $user_id = (int) $auth_id;

        $fetch_daily_record = new FetchDailyRecordForLast7Days();
        $daily_records = $fetch_daily_record($user_id);

        // 月ごとの総学習時間を取得する
        $fetch_record_monthly_paginate = new FetchMonthlyRecordPaginate();
        $monthly_records = $fetch_record_monthly_paginate($user_id);

        $calculate_total_learning_time = new CalculateTotalLearningTime();
        $total_learning_time = $calculate_total_learning_time($user_id);

        return view('analysis.index', [
            'daily_records' => $daily_records,
            'monthly_records' => $monthly_records,
            'total_learning_time' => $total_learning_time
        ]);
    }
}
