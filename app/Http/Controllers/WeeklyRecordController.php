<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeeklyRecordController extends Controller
{
    public function index()
    {
        return view('record_weekly.index');
    }
}
