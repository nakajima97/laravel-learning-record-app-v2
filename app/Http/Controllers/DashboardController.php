<?php

namespace App\Http\Controllers;

use App\UseCases\Record\CalculateTotalStudyTimeThisMonth;
use App\UseCases\Record\CalculateTotalStudyTimeToday;
use App\UseCases\Record\SelectTodayRecord;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $user_id = Auth::id();

        $select_today_record = new SelectTodayRecord();
        $today_records = $select_today_record($user_id);

        $calculate_total_study_time_this_month = new CalculateTotalStudyTimeThisMonth();
        $total_study_time_this_month = $calculate_total_study_time_this_month($user_id);

        $calculate_total_study_time_today = new CalculateTotalStudyTimeToday();
        $total_study_time_today = $calculate_total_study_time_today($user_id);

        return view('dashboard', [
            'today_records' => $today_records,
            'total_study_time_this_month' => $total_study_time_this_month,
            'total_study_time_today' => $total_study_time_today
        ]);
    }
}
