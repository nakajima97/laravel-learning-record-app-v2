<?php

namespace App\Http\Controllers;

use App\UseCases\Record\CalculateTotalStudyTimeThisMonth;
use App\UseCases\Record\CalculateTotalStudyTimeToday;
use App\UseCases\Record\SelectTodayRecord;

class DashboardController extends Controller
{
    public function index()
    {
        $select_today_record = new SelectTodayRecord();
        $today_records = $select_today_record();

        $calculate_total_study_time_this_month = new CalculateTotalStudyTimeThisMonth();
        $total_study_time_this_month = $calculate_total_study_time_this_month();

        $calculate_total_study_time_today = new CalculateTotalStudyTimeToday();
        $total_study_time_today = $calculate_total_study_time_today();

        return view('dashboard', [
            'today_records' => $today_records,
            'total_study_time_this_month' => $total_study_time_this_month,
            'total_study_time_today' => $total_study_time_today
        ]);
    }
}
