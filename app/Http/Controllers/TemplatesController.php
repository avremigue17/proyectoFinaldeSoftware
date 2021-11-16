<?php

namespace App\Http\Controllers;

use App\Models\templates;
use App\Models\texts;
use App\Models\course;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {   
        $data = $request->all();
        $template = new templates;
        $template->course_id = $data["course_id"];
        $template->save();

        $text = new texts;
        $text->text = $data["text"];
        $text->template_id = $template->id;
        $text->save();

        $course = course::find($data["course_id"]);
        $finaly = templates::where('course_id', $course->id);

        return view('registrarCurso', compact('course', 'finaly'));
    }

    public function createMix(Request $request)
    {   
        $data = $request->all();
        $template = new templates;
        $template->course_id = $data["course_id"];
        $template->save();

        $text = new texts;
        $text->text = $data["text"];
        $text->template_id = $template->id;
        $text->save();

        $img = new texts;
        $img->text = 'asd';
        $img->template_id = $template->id;
        $img->save();
        $file = $request->file('img');
        $file_name = 'img'.$img->id.'.'.$file->getClientOriginalExtension();
        $path = $request->file('img')->storeAs(
            'img', $file_name
        );
        $img->text = $file_name;
        $img->save();
        

        $course = course::find($data["course_id"]);
        $finaly = templates::where('course_id', $course->id);

        return view('registrarCurso', compact('course', 'finaly'));
    }

    public function createMixDoble(Request $request)
    {   
        $data = $request->all();
        $template = new templates;
        $template->course_id = $data["course_id"];
        $template->save();

        $text = new texts;
        $text->text = $data["text"];
        $text->template_id = $template->id;
        $text->save();

        $img = new texts;
        $img->text = 'asd';
        $img->template_id = $template->id;
        $img->save();
        $file = $request->file('img');
        $file_name = 'img'.$img->id.'.'.$file->getClientOriginalExtension();
        $path = $request->file('img')->storeAs(
            'img', $file_name
        );
        $img->text = $file_name;
        $img->save();

        $text = new texts;
        $text->text = $data["text2"];
        $text->template_id = $template->id;
        $text->save();

        $img = new texts;
        $img->text = 'asd';
        $img->template_id = $template->id;
        $img->save();
        $file = $request->file('img2');
        $file_name = 'img'.$img->id.'.'.$file->getClientOriginalExtension();
        $path = $request->file('img2')->storeAs(
            'img', $file_name
        );
        $img->text = $file_name;
        $img->save();
        

        $course = course::find($data["course_id"]);
        $finaly = templates::where('course_id', $course->id);

        return view('registrarCurso', compact('course', 'finaly'));
    }

    public function destroy(Request $request)
    {
        $template = templates::find($request['id']);

        if ($template) {
           if ($template->delete()) {
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
