<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\templates;
use Illuminate\Http\Request;
use App\Models\CoursePosts;
use App\Models\questions;

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

        $coursePosts = new CoursePosts;
        $coursePosts->course_id = $course->id;
        $coursePosts->post_id = $data["post_id"];
        $coursePosts->save();
        
        $finaly = templates::where('course_id', $course->id);

        return view('registrarCurso', compact('course','finaly'));
    }

    public function redirect(Request $request)
    {
        $course = course::find($request['course_id']);
        $finaly = questions::where('course_id', $course->id);

        return view('registrarPreguntas', compact('course','finaly'));
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
