<?php

namespace App\Http\Controllers;

use App\Models\records;
use Illuminate\Http\Request;
use App\Models\course;
use App\Models\questions;
use App\Models\answers;

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

    public function show(Request $request)
    {   
        $data = $request->all();
        $record = new records;
        $record->score = $data["score"];
        $record->course_id = $data["course_id"];
        $record->user_id = $data["user_id"];
        $record->save();

        $questions = questions::where("course_id", $data['course_id'])->get();
        $answers = answers::all();
        $course = course::find($request['course_id']);

        return view('mostrarResultado',compact('course','questions','answers'));
    }
}
