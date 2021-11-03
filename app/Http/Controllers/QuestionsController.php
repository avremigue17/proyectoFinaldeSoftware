<?php

namespace App\Http\Controllers;

use App\Models\questions;
use Illuminate\Http\Request;

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

        return redirect()->back();
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
