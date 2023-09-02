<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecordRequest;
use App\UseCases\Category\GetCategoryList;
use App\UseCases\Record\StoreRecord;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $user_id = Auth::id();

        $get_category_list = new GetCategoryList();
        $records = $get_category_list($user_id);

        return view('record.create')->with('records', $records);
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreRecordRequest $request)
    {
        $record = $request->makeRecord();

        $store_record = new StoreRecord();
        $store_record($record);

        return redirect()->route('dashboard');
    }
}
