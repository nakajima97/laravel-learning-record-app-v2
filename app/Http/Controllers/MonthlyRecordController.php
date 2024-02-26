<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\MonthlyRecord\FetchMonthlyRecordPaginate;

class MonthlyRecordController extends Controller
{
    /**
     * 月ごとの総学習時間を返すviewを表示する
     */
    public function index()
    {
        // 月ごとの総学習時間を取得する
        $fetch_record_monthly_paginate = new FetchMonthlyRecordPaginate();
        $monthly_records = $fetch_record_monthly_paginate(auth()->id());

        return view('record_monthly.index', ['monthly_records' => $monthly_records]);
    }
}
