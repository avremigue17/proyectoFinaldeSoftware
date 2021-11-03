<?php

namespace App\Http\Controllers;

use App\Models\answers;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $answer = new answers;
        $answer->answer = $data["answer"];
        $answer->question_id = $data["question_id"];
        $answer->status = $data["status"];
        $answer->save();

        return redirect()->back();
    }

}
