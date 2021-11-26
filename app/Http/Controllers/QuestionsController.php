<?php

namespace App\Http\Controllers;

use App\Models\questions;
use Illuminate\Http\Request;
use App\Models\answers;
use App\Models\course;

class QuestionsController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $question = new questions;
        $question->question = $data["question"];
        $question->course_id = $data["course_id"];
        $question->save();

        $answer = new answers;
        $answer->answer = $data["answer1"];
        $answer->question_id = $question->id;
        $answer->status = $data["status1"];
        $answer->save();

        $answer = new answers;
        $answer->answer = $data["answer2"];
        $answer->question_id = $question->id;
        $answer->status = $data["status2"];
        $answer->save();

        $answer = new answers;
        $answer->answer = $data["answer3"];
        $answer->question_id = $question->id;
        $answer->status = $data["status3"];
        $answer->save();

        $answer = new answers;
        $answer->answer = $data["answer4"];
        $answer->question_id = $question->id;
        $answer->status = $data["status4"];
        $answer->save();

        return redirect()->back();
    }

    public function show(Request $request)
    {   
        $data = $request->all();

        $questions = questions::where("course_id", $data['course_id'])->get();
        $answers = answers::all();
        $course = course::find($request['course_id']);

        return view('mostrarPreguntas', compact('course','answers','questions'));
    }

    public function destroy(Request $request)
    {
        $question = questions::find($request['id']);

        if ($question) {
           if ($question->delete()) {
               return response()->json([
                    'code' => '200',
                ]);
           }
        }
        return response()->json([
            'message' => '¡No se pudo eliminar el registro!',
            'code' => '400',
        ]);
    }
}
