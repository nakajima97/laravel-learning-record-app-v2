<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyRecordController extends Controller
{
    public function index()
    {
        return view('record_daily.index');
    }
}
