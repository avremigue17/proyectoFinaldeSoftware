<?php

namespace App\Http\Controllers;

use App\Models\records;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $record = new records;
        $record->score = $data["score"];
        $record->course_id = $data["course_id"];
        $record->user_id = $data["user_id"];
        $record->save();

        return redirect()->back();
    }
}
