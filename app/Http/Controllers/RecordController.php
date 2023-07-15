<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecordRequest;
use App\UseCases\Record\StoreRecord;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('record.create');
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreRecordRequest $request)
    {
        $record = $request->makeRecord();

        $store_record = new StoreRecord();
        $store_record($record);

        return redirect()->route('records.create');
    }
}
