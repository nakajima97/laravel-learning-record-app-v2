<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordMonthlyController extends Controller
{
    /**
     * 月ごとの総学習時間を返すviewを表示する
     */
    public function index()
    {
        // 月ごとの総学習時間を取得する

        return view('record_monthly.index');
    }
}
