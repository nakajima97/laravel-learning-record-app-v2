<?php

namespace App\Http\Controllers;

use App\UseCases\Record\SelectTodayRecord;

class DashboardController extends Controller
{
    public function index()
    {
        $select_today_record = new SelectTodayRecord();
        $today_records = $select_today_record();

        return view('dashboard', ['today_records' => $today_records]);
    }
}
