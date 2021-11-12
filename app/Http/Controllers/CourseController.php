<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $course = new course;
        $course->name = $data["name"];
        $course->save();

        return view('registrarCurso', compact('course'));
    }

    public function destroy(Request $request)
    {
        $course = course::find($request['id']);

        if ($course) {
           if ($course->delete()) {
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
